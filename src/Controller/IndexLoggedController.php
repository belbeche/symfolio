<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexLoggedController extends AbstractController
{
    /**
     * @Route("/index/logged", name="index_logged")
     */
    public function index(): Response
    {
        return $this->render('index_logged/index.html.twig', [
            'controller_name' => 'IndexLoggedController',
        ]);
    }
}
