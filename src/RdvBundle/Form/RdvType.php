<?php

namespace RdvBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RdvType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date',DateType::class, array(
            'input' => 'datetime',
            'widget' => 'choice',
            'format' =>'dd/MM/yyyy',
        ))
            ->add('time',TimeType::class, array(
                'input'  => 'datetime',
                'widget' => 'single_text',))
            ->add('idService')
            ->add('idUser')
            ->add('Ajouter', SubmitType::class)
            ->setMethod('post');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RdvBundle\Entity\Rdvdate'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'rdvbundle_rdvdate';
    }


}
