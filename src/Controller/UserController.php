<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/user/{slug}", name="user_show")
     */
    public function index(User $user)
    {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $users = $repo->findAll()
        ;

        return $this->render('user/index.html.twig', [
            'title' => 'Page de',
            'user' => $user,
            'users' => $users
        ]);
    }
}
