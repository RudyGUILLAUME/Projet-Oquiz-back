<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\Quiz;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
    
    $builder
        ->add('question', TextType::class, [
            'label' => 'Question'
        ])
        ->add('anecdote', TextType::class, [
            'label' => 'Anecdote',
            'required' => false,
        ])
        ->add('link', TextType::class, [
            'label' => 'Lien Wikipédia',
            'required' => false,
        ])
        ->add('quiz', EntityType::class, [
            'class' => Quiz::class,
            'choice_label' => 'name', // Propriété de l'entité "Quiz" à afficher comme label dans les options
            'label' => 'Choisir un quiz', // Étiquette du champ
            'placeholder' => 'Sélectionner un quiz', // Option de placeholder
        ])
        ->add('answers', CollectionType::class, [
            'entry_type' => AnswerType::class,
            'label' => 'Réponses',
            'entry_options' => [
                'label' => false ],
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ]);
    }
       
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
} 
