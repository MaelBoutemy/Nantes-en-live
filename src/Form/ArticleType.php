<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Author;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('created_At', DateType::class)
            ->add('updated_At',DateType::class)
            ->add('content', TextareaType::class
            )
            ->add('state', CheckboxType::class)
           ->add('author', EntityType::class, [
               'label' => 'form.author.label',
               'translation_domain' => 'forms',
               'class' => Author::class,
               'choice_label' => 'userName',
               'query_builder' => function (EntityRepository $er) {
                   return $er->createQueryBuilder('a')
                       ->orderBy('a.userName', 'ASC');
               },
           ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'label_format' => 'form.article.%name%',
            'translation_domain' => 'forms'
        ]);
    }
}
