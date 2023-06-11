<?php

namespace App\Controller;

use App\Entity\Cv;
use DateTimeImmutable;
use App\Entity\Categorie;
use App\Entity\Commandes;
use App\Repository\CvRepository;
use App\Repository\CategorieRepository;
use App\Repository\CommandesRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CvthequeController extends AbstractController
{
    #[Route('profile/cvtheque', name: 'app_cvthequ')]
    public function index(EntityManagerInterface $entityManager, CvRepository $cvRepository, CategorieRepository $categorieRepository, CommandesRepository $commandesRepository): Response
{
    $user = $this->getUser();
    if ($user) {
        // Récupérer l'ID de l'utilisateur authentifié
        

        $finAbonnement = new \DateTimeImmutable(); // Création d'une variable $finAbonnement contenant la date actuelle

        $commandes = $commandesRepository->findOneBy(['users' => $user]);               //je récupère la commande associé(clé étrangère "users" dans la table commandes) à la clé primaire $user 

        if (isset($commandes) && $commandes->getExpireAt() > $finAbonnement) {           // if (isset($commandes) && $commandes->getExpireAt() > $finAbonnement)
            return $this->render('cvtheque/index.html.twig', [
                'cvs' => $cvRepository->findAll(),
                'user' => $user
            ]);
        } else {
            return $this->redirectToRoute('app_home');
        }
    }

    // Gérer le cas où aucun utilisateur n'est authentifié
    return $this->redirectToRoute('app_home');
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
