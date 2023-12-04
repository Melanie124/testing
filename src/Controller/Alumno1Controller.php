<?php

namespace App\Controller;

use App\Entity\Alumno;
use App\Form\AlumnoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Alumno1Controller extends AbstractController
{
    #[Route('/alumno/a', name: 'app_alumno_a')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $alumno = new Alumno();
        $form = $this->createForm(AlumnoType::class, $alumno);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($alumno);
            $entityManager->flush();
            return $this->redirectToRoute('app_alumno_a'); //Redirección a una ruta especifica.
        }
        return $this->render('alumno1/index.html.twig', [
            'controller_name' => 'AlumnoController',
            'form' => $form,
        ]);
    }
}
