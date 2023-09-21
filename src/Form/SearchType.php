<?php

namespace App\Form;

use App\Model\SearchData;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // Ajout du champ 'q' au formulaire,et on défini le type du champ par TextType.
            ->add('q', TextType::class, [
                // On utilise 'attr' pour définir des attributs HTML supplémentaires, 
                // comme le placeholder pour afficher une invite dans le champ de recherche.
                'attr' => [
                    'placeholder' => 'Tapez pour rechercher...'
                ]
                ]);
            
            
    }
    // On définit les options par défaut pour le formulaire :
    // - 'method' est défini sur 'GET' pour que le formulaire envoie les données de recherche via la méthode GET.
    // - 'data_class' est défini sur SearchData::class, ce qui signifie que les données soumises par le formulaire seront liées à un objet SearchData.
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'method' => 'GET',
                'data_class' => SearchData::class
            ]
            );
    }
}