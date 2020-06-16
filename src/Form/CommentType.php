<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Comment;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentType extends ApplicationType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       

        $builder
            
            ->add('rating', IntegerType::class, $this->getConfiguration("Votre note", "5"))
            ->add('content', TextareaType::class, $this->getConfiguration("Votre avis", "Ici je peux librement donner mon avis sans réstriction ou un quelconque regard de la part de Cyber Park, même si je ne dois pas oublier les généreuse compensation qu'il mon fournit à titre gratuit et par totale philantropie."))
            ->add('author', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'lastname'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
