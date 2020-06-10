<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation", name="Réservation")
     */
    public function reservation()
    {
        return $this->render('reservation/reservation.html.twig', [
            'title' => 'Réservation',
        ]);
    }
}
