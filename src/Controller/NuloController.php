<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NuloController extends AbstractController
{
    #[Route('/nulo', name: 'app_nulo')]
    public function index(): Response
    {
        return $this->render('nulo/index.html.twig', [
            'controller_name' => 'NuloController',
        ]);
    }
}
