<?php

namespace AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('domaine',ChoiceType::class,
            array(
                'choices' => array(
                    'Comptabilité' => 'Comptabilité',
                    'Secrétariat' => 'Secrétariat',
                    'Assistance' => 'Assistance'
                )))

            //->add('domaine')
            ->add('description')
            // ->add('dateCreation')
            ->add('dateExpiration')
            ->add('idPartenaire')

            ->add('Ajouter',submitType::class)
            ->setMethod('post');
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AnnonceBundle\Entity\Annonce'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'annoncebundle_annonce';
    }


}
