<?php

namespace App\Controller;

use App\Form\NewScoreType;
use App\Entity\ScoreVisitor;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="Accueil")
     * 
     * @return Response
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(ScoreVisitor::class);
        $scores = $repo->findAll();

        $newScore = new ScoreVisitor();
        $form = $this->createForm(NewScoreType::class, $newScore);
        
        return $this->render('home/home.html.twig', [
            'title' => 'Accueil',
            'scores' => $scores,
            'form' => $form->createView()
        ]);
    }

    /**
     * Permet de creer un avis
     * 
     * @Route("/newscore", name ="newscore")
     *
     * @return Response
     */
    public function createScore() {

       
        $newScore = new ScoreVisitor();
        $form = $this->createForm(NewScoreType::class, $newScore);
        return $this->render('home/newScore.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
