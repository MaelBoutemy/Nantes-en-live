<?php

namespace App\DataFixtures;


use Faker;
use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    const MICHEL_AUTHOR_REFERENCE = 'michel';

    public function load(ObjectManager $manager)
    {

        $author = new Author();

        $author->setFirstName('michel');
        $author->setLastName('dupont');
        $author->setUserName('M.dupont');
        $author->setEmail('mimi@dudu.fr');
        $author->setPassword('mimi');

        $manager->persist($author);

        $author = new Author();
        $author->setFirstName('carole');
        $author->setLastName('leclerc');
        $author->setUserName('Mme.Leclerc');
        $author->setEmail('lolole@lele.fr');
        $author->setPassword('lele');

        $manager->persist($author);

        $author = new Author();
        $author->setFirstName('pierre');
        $author->setLastName('bout');
        $author->setUserName('M.bout');
        $author->setEmail('boubou@piepie.fr');
        $author->setPassword('boubou');

        $manager->persist($author);


        $manager->flush();

        $this->addReference(self::MICHEL_AUTHOR_REFERENCE, $author);
    }

}
