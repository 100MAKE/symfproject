<?php

namespace App\Controller;
use App\Entity\Classe;

use App\Entity\Professeur;
use App\Repository\ProfesseurRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfesseurController extends AbstractController
{
    #[Route('/professeur', name: 'app_professeur')]
    public function index(ProfesseurRepository $repo,PaginatorInterface $pagination,Request $request): Response
    {   $prof= $repo->findAll();

        
        return $this->render('professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
            'prof' => $prof
        ]);
    }
    #[Route('/professeur/listclass/{id}', name: 'classe_lc')]
    public function listclass($id):Response{

        return $this->render('professeur/lp.html.twig', [
            'controller_name' => 'ProfesseurController',
        
        ]);



    }
    /** 
    *@route("/deletep/{id}",name="prof_delete");
    *
    *@return Response;
    */
    public function deletep(Professeur $profess, ProfesseurRepository $professeurRepository){
    
        $professeurRepository->remove($profess,true);
      return $this->redirectToRoute(" app_professeur");

    }

}
