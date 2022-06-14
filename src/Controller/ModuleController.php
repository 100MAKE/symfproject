<?php

namespace App\Controller;

use App\Entity\Module;
use App\Repository\ModuleRepository;
use Symfony\Component\HttpFoundation\Request;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModuleController extends AbstractController
{
    #[Route('/module', name: 'app_module')]
    public function index(ModuleRepository $repo,PaginatorInterface $pagination,Request $request): Response
    {    
        
        $mod= $repo->findAll();

        return $this->render('module/index.html.twig', [
            'controller_name' => 'ModuleController',
            "mod"=>$mod
        ]);
    }
    public function remove(Module $module,ModuleRepository $moduleRepository )
    {
        $moduleRepository->remove($module);

        return $this->redirectToRoute("app_module");
    }
}
