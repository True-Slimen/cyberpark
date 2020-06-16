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
        // $user = $this->getUser();
        // var_dump($user);

        $repo = $this->getDoctrine()->getRepository(Comment::class);
        $comments = $repo->findBy(array(), array('id' => 'desc'),3,0)
        ;
        
        
        $newComment = new Comment();
        $form = $this->createForm(CommentType::class, $newComment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($newComment);
            $manager->flush();
        }
        
        return $this->render('home/home.html.twig', [
            'title' => 'Accueil',
            'comments' => $comments,
            'form' => $form->createView()
        ]);
    }

    /**
     * Permet de creer un avis
     * 
     * @Route("/newcomment", name ="newscomment")
     *
     * @return Response
     */
    public function createComment(Request $request, EntityManagerInterface $manager) {
        $user = $this->getUser();
        $newComment = new Comment();
        $form = $this->createForm(CommentType::class, $newComment);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($newComment);
            $manager->flush();
        }

        return $this->render('home/newComment.html.twig', 
        [
            'form' => $form->createView()
        ]);
    }
}
