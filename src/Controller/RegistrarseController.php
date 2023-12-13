<?php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrarseController extends AbstractController
{
    #[Route('/registrarse', name: 'app_registrarse')]
    public function index(UserPasswordHasherInterface $passwordHasher): Response
    {
        $usuario = new Usuario();
        $textPassword = $usuario->getPassword();
        $hasherPassword = $passwordHasher->hashPassword($usuario, $textPassword);
        $usuario->setPassword($hasherPassword);
        return $this->render('registrarse/index.html.twig', [
            'controller_name' => 'RegistrarseController',
        ]);
    }
}
