<?php

namespace AppBundle\Form;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
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
            ->add('texte', CollectionType::class, array(
                'entry_type' => TexteType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
                'delete_empty'=>true,
                'allow_delete'=>true,
                'error_bubbling' => true,

            ))
            ->add('datatarget', UrlType::class, array('label'=>'Cible '))
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
