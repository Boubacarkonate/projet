<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Commandes;
use App\Form\CommandesType;
use App\Repository\CvRepository;
use App\Repository\CategorieRepository;
use App\Repository\CommandesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/recruteur/cvtheque')]
class RecruteurCvthController extends AbstractController
{
    #[Route('/', name: 'app_recruteur_cvth_index', methods: ['GET'])]
    public function index(CommandesRepository $commandesRepository, CategorieRepository $categorieRepository): Response
    {
        // $user = $this->getUser();

        // if ($user && $commandesRepository->finabonnement($fin)) {
            
       

     
        return $this->render('categorie/index.html.twig', [
                    'categories' => $categorieRepository->findAll(),
                ]); 
            // }
            //     else {
            //         return $this->redirectToRoute('app_profile_index', [], Response::HTTP_SEE_OTHER);
            //     }
    }

   

    #[Route('/detailcategorie/{id}', name: 'app_detail_categorie')]
    public function show(CvRepository $cvRepository, Categorie $categorie): Response
    {
        $cv_categorie=$cvRepository->findBy([                      //pour voir cv par categorie (video loom crud personnalisé du 21/03 a 18h58)
            'categorie' => $categorie]);
    
            return $this->render('categorie/detailCategorie.html.twig', [
                'cv_categorie' => $cv_categorie,
            ]);
        }

    
}
