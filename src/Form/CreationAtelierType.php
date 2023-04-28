<?php

namespace App\Form;

use App\Entity\Atelier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Theme;
use App\Entity\Vacation;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CreationAtelierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, array(
                'label' => 'Nom atelier : ',
                'label_attr' => ['class' => "form-label"],
                'required' => true, 
                'attr' => ['class' => "form-control"]
            ))

            ->add('nbPlacesMaxi', NumberType::class, array(
                'label' => 'Nombre de places maxi : ',
                'label_attr' => ['class' => "form-label"],

                'required' => true, 
                'attr' => [
                    'class' => "form-control",
                    'min' => "0"]
            ))

            // le choice label doit faire référence au nom exact d'un attribut de la classe utilisée, et importée
            ->add('themes', EntityType::class, [
                'class'=> Theme::class,
                'choice_label'=>'libelle',
                'label_attr' => ['class' => "form-label"],
                'expanded' => true,
                'multiple' => true,
                'mapped' => true
            ])

            // le choice label doit faire référence au nom exact d'un attribut de la classe utilisée, et importée
            ->add('vacations', EntityType::class, [
                'class'=> Vacation::class,
                'choice_label'=>'id',
                'expanded' => true,
                'multiple' => true,
                'mapped' => true
            ])
          
            ->add('Ajouter', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Atelier::class,
        ]);
    }
}
