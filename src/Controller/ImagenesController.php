<?php

namespace App\Controller;

use App\Entity\Imagen\Imagen;
use App\Form\ImagenType;
use App\Repository\Imagen\ImagenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImagenesController extends AbstractController
{
    #[Route('/imagenes', name: 'app_imagenes')]
    public function index(Request $request, EntityManagerInterface $entityManager, ImagenRepository $imagenRepository): Response
    {
        $imagen = new Imagen();
        $form = $this->createForm(ImagenType::class, $imagen);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $archivo = $form['Archivo']->getData();
            $destino = $this->getParameter('kernel.project_dir') . '/public/img';
            $archivo->move($destino, $archivo->getClientOriginalName());
            $imagen->setArchivo($archivo->getClientOriginalName());
            $entityManager->persist($imagen);
            $entityManager->flush();
            return $this->redirectToRoute('app_imagenes');
        }
        return $this->render('imagenes/index.html.twig', [
            'controller_name' => 'ImagenesController',
            'form' => $form,
            'imagenes' => $imagenRepository->findAll()
        ]);
    }
}
