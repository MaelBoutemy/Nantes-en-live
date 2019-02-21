<?php

namespace App\DataFixtures;

use App\Entity\Newsletter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\This;

class NewsletterFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $newsletter = new Newsletter();

        $newsletter->setFirstName('michel');
        $newsletter->setLastName('dupont');
        $newsletter->setEmail('mimi@dudu.fr');
        $newsletter->setAuthor($this->getReference(AuthorFixtures::MICHEL_AUTHOR_REFERENCE));

        $manager->persist($newsletter);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            AuthorFixtures::class,
        ];
        // TODO: Implement getDependencies() method.
    }
}
