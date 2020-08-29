<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Place;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class SearchTripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('departure', EntityType::class, [
            'class' => Place::class,
            'choice_label' => 'name',
        ])
        ->add('arrival', EntityType::class, [
            'class' => Place::class,
            'choice_label' => 'name',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
