<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Créez et persistez des objets User avec des données de test
        $user = new User();
        $user->setFirstname('john');
        $user->setLastname('doe');
        $user->setEmail('john@example.com');
        $user->setPassword('1234');

        $manager->persist($user);

        // Ajoutez d'autres données de test si nécessaire

        $manager->flush();
    }
}