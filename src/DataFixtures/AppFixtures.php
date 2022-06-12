<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $roles=[
            'ROLE_ADMIN',
            'ROLE_CLIENT',
            'ROLE_SUPER_ADMIN'
        ];
        foreach ($roles as $role) {
            $Role = new Role();
            $Role->setLibelle($role);
            $Role->setIsArchived(false);
            $manager->persist($Role);
        }
        $manager->flush();
    }
}
