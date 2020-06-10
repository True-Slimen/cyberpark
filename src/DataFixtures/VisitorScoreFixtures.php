<?php

namespace App\DataFixtures;

use Cocur\Slugify\Slugify;
use App\Entity\ScoreVisitor;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VisitorScoreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $slugify = new Slugify();
    
        $score = new ScoreVisitor();
        $score1 = new ScoreVisitor();
        $score2 = new ScoreVisitor();

    $score->setVisitorName("Alphred Dettinger")
          ->setScore(5)
          ->setComment("Fort de son concept participatif Cyber Park promet de réinventer le concept de parc d'attraction et même de <strong>l'entertainment</strong> !")
          ->setSlug('dettinger-avis')
          ->setCreatedAt(new \DateTime())
          ->setCoverImage("/image/rond-g.png");

          $score1->setVisitorName("Hectorin Davant")
          ->setScore(1)
          ->setSlug('davant-avis')
          ->setComment("Plein d'appréhension, je suis concquis ! Donner mes données personnel ? Si c'est pour des gars comme ceux derrières CyberPark je dis oui !")
          ->setCreatedAt(new \DateTime())
          ->setCoverImage("/image/rond-m.png");

          $score2->setVisitorName("Sydney Laha")
          ->setScore(0)
          ->setSlug("Laha-avis")
          ->setComment("Parc parfait. Gens parfaits. Sécurité parfaite. Le casque ne m'a pas influencé. Tout est parfait. Allez à CyberPark, c'est parfait.")
          ->setCreatedAt(new \DateTime())
          ->setCoverImage("/image/rond-d.png");

          $manager->persist($score);
    $manager->flush();
    $manager->persist($score1);
    $manager->flush();
    $manager->persist($score2);
    $manager->flush();
    }
}
