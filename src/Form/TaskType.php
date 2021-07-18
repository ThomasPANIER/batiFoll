<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
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
            ->add('deadline', null, [
                'label' => 'Deadline :'
            ])
            ->add('statut', ChoiceType::class, [
                'placeholder' => 'Choisissez un statut',
                'choices' => [
                    'Tache en cours' => false,
                    'Tache terminée' => true
                ],
                'multiple' => false,
                'empty_data' => '0',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}