<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnneescolaireController extends AbstractController
{
    #[Route('/anneescolaire', name: 'app_anneescolaire')]
    public function index(): Response
    {
        return $this->render('anneescolaire/index.html.twig', [
            'controller_name' => 'AnneescolaireController',
        ]);
    }
}
