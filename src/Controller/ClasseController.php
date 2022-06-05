<?php

namespace App\Controller;
use App\Entity\Classe;
use App\Form\FormType;
use App\Repository\ClasseRepository;
use Doctrine\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\form;

class ClasseController extends AbstractController
{
    #[Route('/classe', name: 'app_classe')]
    public function index(ClasseRepository $repo,PaginatorInterface $pagination,Request $request): Response
    {    $repo->findAll();
        //  dd($repo->findAll());
        $last= $repo->findAll();
        $last=$pagination->paginate($last,$request->query->getInt('page',1),5);
        
        return $this->render('classe/index.html.twig', [
            'controller_name' => 'ClasseController',
            'last' => $last
            
        ]);
    }
    /** 
    *@route("/delete/{id}",name="classe_delete");
    *
    *@return Response;
    */
    public function delete(classe $classe, ClasseRepository $classeRepository){
    
        $classeRepository->remove($classe,true);
      

        //  return new Response("classe supprimer");
      return new Response($this->redirectToRoute("app_classe"));

    }
       /** 
    *@route("/classe/edit/{id}",name="classe_edit");
    *
    *@return Response;
    */
    public function edit($id ,ClasseRepository $class,Request $request){
        

        $classe = $class->find($id);
        $form = $this->createForm(FormType::class, $classe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $class ->add( $form->getData(),true);
        }

        return $this->render('classe/add.html.twig', [
            'form' => $form->createView()
        ]);



    }
       /** 
    *@route("/classe/plus",name="classe_plus");
    *
    *@return Response;
    */

    // public function plus(classe $classe, ClasseRepository $classeRepository)
    // { 
    //     // $this->getEntityManager()->persist($entity);

    //     // if ($flush) {
    //     //     $this->getEntityManager()->flush();
    //     // }
    //     $classeRepository->add($classe,true);
      

    //     //  return new Response("classe supprimer");
    //   return new Response($this->redirectToRoute("app_classe"));
    // }   
    
        







    

}
