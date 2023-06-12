<?php

namespace App\Controller;

use App\Repository\CvRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    #[Route('//search', name: 'app_search',  methods: ['GET'])]
    public function search(Request $request, CvRepository $cvRepository): Response {

        $recherche = $request->query->get('search');

        if (!empty($recherche)) {
            $resultats = $cvRepository->trouverCv($recherche);
        } else {
            $resultats = $cvRepository->findAll();
        }
        return $this->render('search/index.html.twig', [
            'resultats' => $resultats,
        ]);
    }
}
