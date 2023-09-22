<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\CarRegistration;
use App\Entity\Garage;
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
        $user->addCarRegistration($car_registration);
        $car_registration->setSiret("362 521 879 00034");
        $car_registration->setUser($user);
        $car_registration->setFirstname($user->getFirstname());
        $car_registration->setName($user->getLastname());

        $garage = new Garage();
        $garage->setCarRegistration($car_registration);
        $garage->setName("Garage de la gare");
        $garage->setAddress("1 rue de la gare");
        $garage->setEmail("garage_de_la_gare");
        $garage->setPhoneNumber("0622456589");

        $voiture = new Car();
        $voiture->setCarRegistration($car_registration);
        $voiture->setCarRegistrationCode("AB-123-CD");
        $voiture->setModel("Renault");
        $voiture->setPrice("10000");
        $voiture->setKilometer("122502");
        $voiture->setColor("rouge");

        $manager->persist($garage);
        $manager->persist($car_registration);
        $manager->persist($user);

        // Ajoutez d'autres données de test si nécessaire

        $manager->flush();
    }
}