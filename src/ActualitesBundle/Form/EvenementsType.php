<?php

namespace ActualitesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('dateDebut',DateType::class, array(
                'input' => 'datetime',
                'widget' => 'choice',
                'format' =>'dd/MM/yyyy',
            ))

            ->add('dateFin',DateType::class, array(
                'input' => 'datetime',
                'widget' => 'choice',
                'format' =>'dd/MM/yyyy',
            ))

            ->add('horaireCom',TimeType::class, array(
                'input'  => 'datetime',
                'widget' => 'single_text',))

            ->add('horaireFin',TimeType::class, array(
                'input'  => 'datetime',
                'widget' => 'single_text',))
            ->add('description')
            ->add('image',FileType::class, array('data_class' => null,
            ))
            ->add('idCategorie')
            ->add('Ajouter',submitType::class)
            ->setMethod('post');

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ActualitesBundle\Entity\Evenements'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'actualitesbundle_evenements';
    }


}
