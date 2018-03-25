<?php

namespace PidevEsbeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class FosUserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom');
        $builder ->add('prenom')
            ->add('adresse')
            ->add('dateNaissance',BirthdayType::class)
            ->add('codePostal')
            ->add('sexe')
            ->add('numTel')
            ->add('photoProfil')
            ->add('type')
            ->add('specialite')
            ->add('pays')
            ->add('status');
    }


    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()

    {
        return 'app_user_registration';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PidevEsbeBundle\Entity\FosUser'
        ));
    }
    public function getName()

    {
        return $this->getBlockPrefix();
    }


}
