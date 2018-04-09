<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/04/2018
 * Time: 11:52
 */



namespace AnnonceBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheAjaxAnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domaine',null,array('label'=>false,'attr' => array(
                'placeholder' => 'Recherche'
            )));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'annonce_bundle_recherche_ajax_annonce_type';
    }
}