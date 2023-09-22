<?php

namespace App\Controller;

use App\Entity\CarRegistration;
use App\Entity\Car;
use App\Entity\Garage;
use App\Entity\User;
use App\Form\CarRegistrationType;
use App\Repository\CarRegistrationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarRegistrationController extends AbstractController
{
    #[Route('/carRegistration', name: 'car_registration', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserRepository $userRepo): Response
    {
        $thisuser = $this->getUser();
        if (!$thisuser) {
            return $this->redirectToRoute('app_login');
        }
        $user = $userRepo->findOneBy(["email" => $thisuser->getUserIdentifier()]);
        dump($user);
        $garage = new Garage();
        $car = new Car();
        $carRegistration = new CarRegistration();
        $form = $this->createForm(CarRegistrationType::class, $carRegistration);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $garage->setName($form->get('garageName')->getData());
            $garage->setAddress($form->get('garageAdress')->getData().$form->get('garageCity')->getData().$form->get('garageCP')->getData());
            $garage->setEmail($form->get('garageMail')->getData());
            $garage->setPhoneNumber($form->get('garagePhone')->getData());
            $car->setModel($form->get('carModel')->getData());
            $car->setPrice($form->get('carPrice')->getData());
            $car->setKilometer($form->get('kilometer')->getData());
            $car->setColor($form->get('color')->getData());
            $car->setCarRegistrationCode($form->get('registration')->getData());
            $carRegistration->setGarage($garage);
            $carRegistration->setCar($car);
            $carRegistration->setUser($user);
            $user->addCarRegistration($carRegistration);
            $entityManager->persist($carRegistration);
            $entityManager->flush();

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('car_registration/index.html.twig', [
              'car_registration' => $carRegistration,
              'form' => $form,
         ]);
    }

    
}
