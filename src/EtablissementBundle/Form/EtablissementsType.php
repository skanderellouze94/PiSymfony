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
            ->add('nom')
            ->add('adresse')
            ->add('image',FileType::class, array('label' => 'Image','data_class'=>null))
            ->add('dateOuverture')
            ->add('dateFermeture')
            ->add('email')
            ->add('numero')
            ->add('fax')
            ->add('pageFacebook')
            ->add('siteWeb')
            ->add('heureOuverture')
            ->add('heureFermeture')
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

                    )));

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
