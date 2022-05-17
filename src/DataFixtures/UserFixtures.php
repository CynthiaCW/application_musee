<?php

namespace App\DataFixtures;

use App\Entity\Interfaces\IRoles;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture implements IRoles
{
    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher) 
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail("admin@admin.fr");
        $user->setNom("panivinho");
        $user->setPrenom("marcelinno");
        $user->addRole(self::ROLE_ADMIN);
        $user->setPassword($this->userPasswordHasher->hashPassword(
            $user, 
            "marcel"
            )
    );
    $manager->persist($user);

        $user = new User;
        $user->setEmail("cynthia@hotmail.fr");
        $user->setNom("colo");
        $user->setPrenom("cynthia");
        $user->addRole(self::ROLE_ADMIN);
        $user->setPassword($this->userPasswordHasher->hashPassword(
             $user, 
             "cynthia07"
             )
        
    );
    $manager->persist($user);
    
    $manager->flush();
    }
}
