<?php

namespace App\Controller;

use App\Repository\ClasseRepository;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClasseController extends AbstractController
{
    #[Route('/classe', name: 'app_classe')]
    public function index(ClasseRepository $repo,
    PaginatorInterface $pagination,
    Request $request): Response
    {    $repo->findAll();
        //  dd($repo->findAll());
        $last= $repo->findAll();
        $last=$pagination->paginate($last,$request->query->getInt('page',1),5);
        
        return $this->render('classe/index.html.twig', [
            'controller_name' => 'ClasseController',
            'last' => $last
            
        ]);
    }
}
