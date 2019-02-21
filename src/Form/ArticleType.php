<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Author;
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
            ->add('title', null, [
                'attr' => [
                    'class' => 'title'
                ]
            ])
            ->add('content', TextareaType::class)
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'userName',
            ])
            ->add('updated_At',DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('created_At', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('content', TextareaType::class
            )
            ->add('state', CheckboxType::class, [
                'label'    => 'Show this entry publicly?',
                'required' => false,
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'label_format' => 'article.%name%',
            'translation_domain' => 'article'
        ]);
    }
}
