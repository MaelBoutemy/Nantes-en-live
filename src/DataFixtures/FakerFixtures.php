<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class FakerFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct()
    {
        $this->faker = $faker = Faker\Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager)
    {
        $faker = $this->faker;
        // on créé 10 personnes
        for ($i = 0; $i < 10; $i++) {

            $article = new Article();

            $article->setTitle($faker->title);
            $article->setContent($faker->paragraph);
            $article->setAuthor($this->getReference(AuthorFixtures::class));

            $manager->persist($article);
        }

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
        ]  ;
        // TODO: Implement getDependencies() method.
    }
}
