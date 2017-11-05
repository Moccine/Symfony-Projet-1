<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PriceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pricemax', MoneyType::class,
                array('label'=>'Montant HT',
                    'divisor' => 100,
            ))
            ->add('pricemin', MoneyType::class, array('label'=>'Montant TTC'))
            ->add('unitprice', MoneyType::class, array('label'=>'Prix unitaire (HT)'))
            ->add('unity', TextType::class, array('label'=>'unité-Kg-Litre'))
            ->add('taxrules' , ChoiceType::class, array('label'=>'Règle de taxe'))
            ->add('wholesaleprice' , MoneyType::class, array('label'=>'Prix d\'achat - Montant HT'))
            ->add('currency', ChoiceType::class, array(
                'choices'=>array('EUR'=>'euro','USD'=>'USD','FNG'=>'FNG',)
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Price'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_price';
    }


}
