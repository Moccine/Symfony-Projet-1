<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SliderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('datahref')
            ->add('texte', TexteType::class)
            ->add('datatarget', TextType::class, array('label'=>'Cible '))
            ->add('datathumbheight', IntegerType::class, array('label'=>'Hauteur'))
            ->add('datathumbwitdth', IntegerType::class, array('label'=>'Longueur'))
            ->add('datathumb', CheckboxType::class, array('label'=>'Afficher les miniature'))
             ->add('figure', ImageType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Slider'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_slider';
    }


}
