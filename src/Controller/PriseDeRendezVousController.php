<?php

namespace App\Controller;

use App\Repository\CalendarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PriseDeRendezVousController extends AbstractController
{
    /**
     * @Route("/prise-rendez-vous", name="prise_de_rendez_vous")
     */
    public function index(CalendarRepository $calendar): Response
    {

        $events = $calendar->findAll();

        $rdv = [];
        foreach ($events as $event) {
            $rdv[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'background-color' => $event->getBackgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
                'allDay' => $event->getAllDay(),
            ];
        }
        $data = json_encode($rdv);
        return $this->render('prise_de_rendez_vous/index.html.twig', compact('data'));
    }
}
