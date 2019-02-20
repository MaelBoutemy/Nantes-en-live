<?php

namespace App\DataFixtures;


use Faker;
use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AuthorFixtures extends Fixture implements DependentFixtureInterface
{

    private $faker;

    public function __construct()
    {
        $this->faker = $faker = Faker\Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = $this->faker;

        for ($i = 0; $i < 10; $i++) {


        $author = new Author();

        $author->setFirstName($faker->firstName);
        $author->setLastName($faker->lastName);
        $author->setUserName($faker->name);
        $author->setEmail($faker->name);
        $author->setEmail($faker->email);
        $author->setPassword($faker->password);

        $manager->persist($author);
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
        // TODO: Implement getDependencies() method.
    }
}
