<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture
{

    private $passwordEncoder;


    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $users = new User();
        $users->setEmail('admin@admin.com');
        $users->setRoles(["ROLE_ADMIN"]);
        $users->setPassword($this->passwordEncoder->encodePassword(
            $users,
            'admin'
        ));

        $manager->persist($users);

        $manager->flush();
    }
}
