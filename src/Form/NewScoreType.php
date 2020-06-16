<?php

namespace App\Form;

use App\Entity\ScoreVisitor;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NewScoreType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('visitorName', TextType::class, [
                'label' => 'Prénom et nom de l\'auteur',
                'attr' => [
                    'placeholder' => "Jean Pacotille"
                ]
            ])
            ->add('score')
            ->add('slug')
            ->add('comment')
            ->add('createdAt')
            ->add('coverImage')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ScoreVisitor::class,
        ]);
    }
}
