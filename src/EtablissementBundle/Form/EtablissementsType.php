<?php

namespace EtablissementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtablissementsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',null, array('label' => false))
            ->add('adresse',null, array('label' => false))
            ->add('image',FileType::class, array('label' => 'Image','data_class'=>null ,'label' => false))
            ->add('dateOuverture',null, array('label' => false))
            ->add('dateFermeture',null, array('label' => false))
            ->add('email',null, array('label' => false))
            ->add('numero',null, array('label' => false))
            ->add('fax',null, array('label' => false))
            ->add('pageFacebook',null, array('label' => false))
            ->add('siteWeb',null, array('label' => false))
            ->add('heureOuverture',null, array('label' => false))
            ->add('heureFermeture',null, array('label' => false))
            ->add('type' ,ChoiceType::class,
                array(
                    'choices' => array(
                        '' => ' ',
                        'cabinet medical' => 'cabinet medical',
                        'centre beaute' => 'centre beaute',
                        'herboriseterie' => 'herboriseterie',
                        'hopital' => 'hopital',
                        'laboratoire' => 'laboratoire',
                        'parapharmacie' => 'parapharmacie',
                        'pharmacie' => 'pharmacie',
                        'salle de sport' => 'salle de sport'

                    ),'label' => false));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EtablissementBundle\Entity\Etablissements'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'etablissementbundle_etablissements';
    }


}
