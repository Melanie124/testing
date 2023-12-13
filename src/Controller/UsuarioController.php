<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\LoginType;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UsuarioController extends AbstractController
{
    #[Route('/usuario', name: 'app_usuario')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render('usuario/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
}
