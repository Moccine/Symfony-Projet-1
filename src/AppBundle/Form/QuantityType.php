<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuantityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('quantity', TextType::class,
            array('label' => 'Quantité'))
            ->add('minimalquantity', IntegerType::class,
                array('label' => 'Quantité minimale pour la vente',
                    'data' => 1))
            ->add('outofstock', ChoiceType::class, array(
                'label'=>'Préférences de disponibilité',
                'choices'=>array(
                    'Refuser les commandes'=>'1',
                     'Accepter les commandes'=>'2'

                )
            ))
            ->add('availablenow', TextType::class, array('label'=>'Libellé si en stock'))
            ->add('availablelater', TextType::class, array('label'=>'Si rupture de stock (et précommande autorisée)'))
            ->add('availabledate', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'label'=>'Date de disponibilité',
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => false,
                // add a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Quantity'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_quantity';
    }


}
