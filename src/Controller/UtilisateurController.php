<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UtilisateurController extends AbstractController
{
     #[Route('/utilisateur', name: 'app_utilisateur')]
     public function index(): Response
     {
         return $this->render('utilisateur/index.html.twig', [
             'controller_name' => 'UtilisateurController',
         ]);
     }

     /**
      * @Route(
      *     path="/api/admin/user/{id}/image",
      *     methods={"POST"},
      *     defaults={
      *          "__controller"="App\Controller\UtilisateurController::AddUser",
      *          "__api_resource_class"=Utilisateur::class,
      *          "__api_collection_operation_name"="add_user",
      *         
      *     }
      * )
     */
//      public function updateUserImage ($id,UserRepository $rep )
//      {
//          dd();
//          $user=$user_se;   
//          return $this->json($user,Response::HTTP_CREATED);
                    
//      } 
// }
}