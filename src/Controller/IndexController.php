<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
    #[Route('/ChoixProjet', name: 'choixprojet')]
    public function ChoixProjet(): Response
    {
        return $this->render('index/Chooseproject.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
