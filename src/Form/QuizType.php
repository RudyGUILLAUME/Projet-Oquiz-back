<?php

namespace App\Form;

use App\Entity\Quiz;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class QuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Nom'
        ])
        ->add('picture', TextType::class, [
            'label' => 'Image',
            'required' => false,
        ])
        ->add('description', TextareaType::class, [
            'label' => 'Description',
            'required' => false,
        ])
    
        ->add('category', EntityType::class, [
            'class' => category::class,
            'choice_label' => 'name', // Propriété de l'entité "Quiz" à afficher comme label dans les options
            'label' => 'Choisir une catégorie', // Étiquette du champ
            'placeholder' => 'Sélectionner une catégorie', // Option de placeholder
            // Ajoutez d'autres options du champ si nécessaire
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Quiz::class,
        ]);
    }
}
