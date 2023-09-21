<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarRegistrationRepository;
class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    #[Route('/my_car_registration', name: 'app_my_car_registration')]
    public function myCarRegistration(CarRegistrationRepository $carRegistrationRepository): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $myCarRegistrations = $carRegistrationRepository->findBy(['user' => $user]);

        return $this->render('default/my_car_registration.html.twig', [
            'controller_name' => 'DefaultController',
            'myCarRegistrations' => $myCarRegistrations
        ]);
    }
}
