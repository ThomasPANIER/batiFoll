<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom :'
            ])
            ->add('description', null, [
                'label' => 'Description :'
            ])
            // ->add('creationdate', null, [
            //     'label' => 'Date de création :'
            // ])
            ->add('deadline', null, [
                'label' => 'Deadline :'
            ])
            ->add('statut', ChoiceType::class, [
                'placeholder' => 'Choisissez un statut',
                'choices' => [
                    'Projet en cours' => false,
                    'Projet terminé' => true
                ],
                'multiple' => false,
                'empty_data' => '0',
                // 'expanded' => false,
                'required' => false
            ])
            
            //->add('userproject')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
