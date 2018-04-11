<?php

namespace ReclamationBundle\Form;

use ArrayObject;
use DoctrineTest\InstantiatorTestAsset\ArrayObjectAsset;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Console\Tests\Descriptor\ObjectsProvider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;

class ReponseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#3e99a5'
                )))
        ->add('Envoyer', SubmitType::class  )
        ->setMethod('post');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ReclamationBundle\Entity\Reponse'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'reclamationbundle_reponse';
    }


}
