<?php

namespace App\Controller;
use App\Entity\Classe;
use App\Form\FormType;
use App\Repository\ClasseRepository;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
    *@route("/classe/ajmodif",name="classe_aj");
     *@route("/classe/ajmodif/{id}",name="classe_modif");
    *
    *@return Response;
    */
   

    public function ajmodif(Classe $classe=null , Request $request,ClasseRepository $class)
    { 
        if ($classe==null) {
            $classe=new Classe();
        }
        
        $form=$this->createFormBuilder($classe)
                   ->add('libelleclasse')
                   ->add('niveau')
                   ->add('filiere')
                   ->add('validez', SubmitType::class)
                   ->getForm();
        $form->handleRequest($request);

                   if ($form->isSubmitted() && $form->isValid()) {
                     $class ->add($form->getData(),true);

                }
                   return $this->render('classe/add.html.twig', [
                    'form' => $form->createView()
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
      return $this->redirectToRoute("app_classe");

    }
    //    /** 
    // *@route("/classe/edit/{id}",name="classe_edit");
    // *
    // *@return Response;
    // */
    // public function edit($id ,ClasseRepository $class,Request $request){
        

    //     $classe = $class->find($id);
    //     $form = $this->createForm(FormType::class, $classe);
    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $class ->add( $form->getData(),true);
    //     }

    //     return $this->render('classe/modif.html.twig', [
    //         'form' => $form->createView()
    //     ]);

    // }


   
        







    

}
