<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="Accueil")
     */
    public function index()
    {
        return $this->render('page/index.html.twig', [
            'title' => 'Accueil',
        ]);
    }

    /**
     * @Route("/le-park", name="Le Park")
     */
    public function lepark()
    {
        return $this->render('page/lepark.html.twig', [
            'title' => 'Le Park',
        ]);
    }

    /**
     * @Route("/reservation", name="Réservation")
     */
    public function reservation()
    {
        return $this->render('page/reservation.html.twig', [
            'title' => 'Réservation',
        ]);
    }

    /**
     * @Route("/contact", name="Contact")
     */
    public function contact()
    {
        return $this->render('page/contact.html.twig', [
            'title' => 'Contact',
        ]);
    }
}
