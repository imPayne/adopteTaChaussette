<?php

namespace App\DataFixtures;

use App\Entity\CarRegistration;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager)
    {
        // Créez et persistez des objets User avec des données de test
        $user = new User();
        $user->setFirstname('john');
        $user->setLastname('doe');
        $user->setEmail('john@example.com');
        $user->setPassword($this->hasher->hashPassword($user, 'john'));
        $user->setBirthDay(new \DateTime('1990-01-01'));

        $car_registration = new CarRegistration();




        $manager->persist($user);

        // Ajoutez d'autres données de test si nécessaire

        $manager->flush();
    }
}