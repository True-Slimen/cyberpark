<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        // Nous gérons les User
        
           

            $user = new User();
            $hash = $this->encoder->encodePassword($user, 'password');

            $user->setFirstName('Alphred')
                 ->setLastName('Dettinger')
                 ->setEmail('dettinger@mail.com')
                 ->setPicture("/image/rond-g.png")
                 ->setHash($hash)
                 ->setIntroduction('Journaliste pour "Leur Monde", je parcours la terre pour dénicher les meilleures vacances du moment !');
                 
                 
                $manager->persist($user);
                $author[] = $user;
                

            $comment = new Comment();
            $comment->setCreatedAt(new \DateTime())
                    ->setRating(5)
                    ->setContent("Fort de son concept participatif Cyber Park promet de réinventer le concept de parc d'attraction et même de <strong>l'entertainment</strong> !")
                    ->setAuthor($author[0]);
                 
                $manager->persist($comment);


            $user2 = new User();
            $hash2 = $this->encoder->encodePassword($user2, 'password');
            $user2->setFirstName('Hectorin')
                     ->setLastName('Davant')
                     ->setEmail('davant@mail.com')
                     ->setPicture("/image/rond-m.png")
                     ->setHash($hash2)
                     ->setIntroduction('Reporter pour "BNM Intox", je reste impartial sur chaque enquête !');
                     
                     
                    $manager->persist($user2);
                    $author[] = $user2;
                    
    
                $comment2 = new Comment();
                $comment2->setCreatedAt(new \DateTime())
                        ->setRating(1)
                        ->setContent("Plein d'appréhension, je suis concquis ! Donner mes données personnel ? Si c'est pour des gars comme ceux derrières CyberPark je dis oui !")
                        ->setAuthor($author[1]);
                     
                    $manager->persist($comment2);

                $user3 = new User();
                $hash3 = $this->encoder->encodePassword($user3, 'sky-skirmish');
                $user3->setFirstName('Sydney')
                         ->setLastName('Laha')
                         ->setEmail('laha@mail.com')
                         ->setPicture("/image/rond-d.png")
                         ->setHash($hash3)
                         ->setIntroduction('Enquêtrice de talent, je suis au top de l\'Objectivité pour donner mon avis sur à peu près tout et n\'importe quoi.');
                         
                         
                        $manager->persist($user3);
                        $author[] = $user3;
                        
        
                    $comment3 = new Comment();
                    $comment3->setCreatedAt(new \DateTime())
                            ->setRating(0)
                            ->setContent("Parc parfait. Gens parfaits. Sécurité parfaite. Le casque ne m'a pas influencé. Tout est parfait. Allez à CyberPark, c'est parfait.")
                            ->setAuthor($author[2]);
                         
                        $manager->persist($comment3);
          
                
                
               $manager->persist($user);
               


                $manager->flush();
    }
}
