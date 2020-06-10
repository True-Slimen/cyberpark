<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LeParkController extends AbstractController
{
    /**
     * @Route("/le/park", name="Le Park")
     */
    public function lepark()
    {
        return $this->render('le_park/lepark.html.twig', [
            'title' => 'Le Park',
            
        ]);
    }
}
