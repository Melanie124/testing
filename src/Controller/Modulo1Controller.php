<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Modulo1Controller extends AbstractController
{
    #[Route('/modulo1', name: 'app_modulo1')]
    public function index(): Response
    {
        return $this->render('modulo1/index.html.twig');
    }
}
