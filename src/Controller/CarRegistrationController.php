<?php

namespace App\Controller;

use App\Entity\CarRegistration;
use App\Form\CarRegistrationType;
use App\Repository\CarRegistrationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarRegistrationController extends AbstractController
{

    #[Route('/carRegistration', name: 'car_registration', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $carRegistration = new CarRegistration();
        $form = $this->createForm(CarRegistrationType::class, $carRegistration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($carRegistration);
            $entityManager->flush();

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }
        if ($form->isSubmitted() && $form->isValid() === false) {
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
