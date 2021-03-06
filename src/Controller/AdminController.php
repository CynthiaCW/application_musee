<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'app_admin')] 
class AdminController extends AbstractController
{
    // Correspond à des arguments | Pour la route enlever home et mettre seulement la racine /
    #[Route('/', name: 'app_admin')] 
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
