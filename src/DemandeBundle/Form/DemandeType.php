<?php

namespace DemandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class DemandeType extends AbstractType


{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('cin')
            ->add('dateNaissance',DateType::class, array(
                'input' => 'datetime',
                'widget' => 'choice',
                'format' =>'dd/MM/yyyy',
            ))
            ->add('cinImageRecto',FileType::class, array('data_class' => null,'label'=>false
            ))
            ->add('cinImageVerso',FileType::class, array('data_class' => null,'label'=>false
            ))
            ->add('diplome',FileType::class, array('data_class' => null,'label'=>false
            ))
            ->add('photoEtab',FileType::class, array('data_class' => null,'label'=>false
            ))
            ->add('numIdentifiant')
            ->add('patente',FileType::class, array('data_class' => null,'label'=>false
            ))
            ->add('Ajouter',submitType::class)
            ->setMethod('post');

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DemandeBundle\Entity\Demande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'demandebundle_demande';
    }


}
