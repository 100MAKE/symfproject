<?php

namespace App\Controller;

use App\Repository\ClasseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClasseController extends AbstractController
{
    #[Route('/classe', name: 'app_classe')]
    public function index(ClasseRepository $repo): Response
    {    $repo->findAll();
        //  dd($repo->findAll());
        $last= $repo->findAll();
        
        return $this->render('classe/index.html.twig', [
            'controller_name' => 'ClasseController',
            'last' => $last
            
        ]);
    }
}
