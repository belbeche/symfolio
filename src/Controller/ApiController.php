<?php

namespace App\Controller;

use App\Entity\Calendar;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    /**
     * @Route("/api/{id}/edit", name="api_edit", methods={"PUT"})
     */
    public function majEvent(?Calendar $calendar, Request $request): Response
    {
        // On récupère les données
        $donnees = json_decode($request->getContent());

        if (
            // je vérifie les données de la table Calendar
            isset($donnees->title) && !empty($donnees->title) &&
            isset($donnees->start) && !empty($donnees->start) &&
            isset($donnees->description) && !empty($donnees->description) &&
            isset($donnees->backgroundColor) && !empty($donnees->backgroundColor) &&
            isset($donnees->borderColor) && !empty($donnees->borderColor) &&
            isset($donnees->textColor) && !empty($donnees->textColor)
        ) {
            // les données sont complètes
            // On initiliase un code 
            $code = 200;

            // on vérifie si l'id existe
            if (!$calendar) {
                // on instancie un rendez-vous
                $calendar = new Calendar();

                // On change le code (CREATED)
                $code = 201;
                // On hydrate l'objet avec les données
                $calendar->setTitle($donnees->setTitle());
                $calendar->setStart($donnees->setStart());
                if($donnees->allDay)
                $calendar->setDescription($donnees->setDescription());
                $calendar->setBackgroundColor($donnees->setBackgroundColor());
                $calendar->setBorderColor($donnees->setBorderColor());
                $calendar->setTextColor($donnees->setTextColor());
            }
        } else {
            // les données sont incomplète
            return new Response('Donées incomplètes', 404);
        }

        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
