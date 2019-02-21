<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder=$passwordEncoder;
    }

    public function load(ObjectManager $manager)

    {
      $users= new Users();

            $users->setPassword($this->passwordEncoder->encodePassword($users, 'the new password'));



        $manager->flush();
    }
}
