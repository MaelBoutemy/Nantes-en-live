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
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)

    {
        $thibault= new Users();
        $thibault->setName('Thibault');
        $thibault->setPassword($this->passwordEncoder->encodePassword($thibault, 'titi'));
        $thibault->setEmail('thibault@thibault.fr');
        $thibault->setRoles(['ROLE_ADMIN']);

        $manager->persist($thibault);

        $mael= new Users();
        $mael->setName('Mael');
        $mael->setPassword($this->passwordEncoder->encodePassword($mael, 'mama'));
        $mael->setEmail('mael@mael.fr');
        $mael->setRoles(['ROLE_ADMIN']);

        $manager->persist($mael);

        $manager->flush();
    }
}
