<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Form\NewScoreType;
use App\Entity\ScoreVisitor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request, EntityManagerInterface $manager)
    {
       

        $repo = $this->getDoctrine()->getRepository(Comment::class);
        $comments = $repo->findBy(array(), array('id' => 'desc'),3,0)
        ;
        
        $newComment = new Comment();
        $form = $this->createForm(CommentType::class, $newComment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $newComment->setAuthor($this->getUser());
            $manager->persist($newComment);
            $manager->flush();

            $this->addFlash(
                'success',
                "L'avis a bien était créé, rachraichissais la page pour le voir."
            );
        }
        
        return $this->render('home/home.html.twig', [
           
            'title' => 'Accueil',
            'comments' => $comments,
            'form' => $form->createView()
        ]);
    }

  
}
