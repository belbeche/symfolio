<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Form\PublicationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexLoggedController extends AbstractController
{
    /**
     * @Route("/index", name="index_logged")
     */
    public function index(): Response
    {

        return $this->render('index_logged/index.html.twig');
    }
}
