<?php

namespace AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       // ->add('datePostulation')
            //  ->add('etat')
          $builder  ->add('niveauEtude',ChoiceType::class,
                array(
                    'choices' => array(
                        'Baccalauréat' => 'Baccalauréat',
                        'Licence' => 'Licence',
                        'Master' => 'Master',
                        'Doctorat' => 'Doctorat',
                        'Maîtrise' => 'Maîtrise',
                        'Ingénierie' => 'Ingénierie'
                    )))
            ->add('cv', FileType::class, array ('label' => 'Cv'))
            // ->add('idAnnonce')
           // ->add('idUtilisateur')

            ->add('Ajouter',submitType::class)
            ->setMethod('post');
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AnnonceBundle\Entity\Candidature'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'annoncebundle_candidature';
    }


}
