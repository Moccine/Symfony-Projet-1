<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('notes', ChoiceType::class, array(
            'choices'=>array(
                '0'=>0,
                '1'=>'1',
                '2'=>'2',
                '3'=>'3',
                '4'=>'4',
                '5'=>'5'

             )
        ))
            ->add('commentaire', TextareaType::class)
            ->add('state', ChoiceType::class ,
                array('label'=> 'Etat',
                    'choices'=>array(
                    "nouveau"=> 1,
                    "utilisé"=>2,
                    "reconditionné"=>3
                )))
            ->add('ean', TextType::class)
            ->add('isbn')
            ->add('upc')
            ->add('showcondition', CheckboxType::class, array('label'=>'Afficher le status'));
        //->add('promo');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Options'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_options';
    }


}
