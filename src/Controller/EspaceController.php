<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspaceController extends AbstractController
{
    #[Route('profile/recruteur/espace', name: 'app_espace_recruteur')]
    public function recruteur(): Response
    {
        return $this->render('espace/recruteur.html.twig', [
           
        ]);
    }

    #[Route('candidat/espace', name: 'app_espace_candidat')]
    public function candidat(): Response
    {
        return $this->render('espace/candidat.html.twig', [
           
        ]);
    }
}
