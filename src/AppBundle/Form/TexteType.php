<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TexteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('textFontSize')
            ->add('textFontLine')
            ->add('textFontFamily')
            ->add('textFontColor')
            ->add('textYPos')
            ->add('textAnimation')
            ->add('textAnimationDelay')
            ->add('textClass');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Texte'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_texte';
    }

    private function getTexAnimation()
    {
        return array(
            'bounce' => 'bounce',
            'flash' => 'flash',
            'pulse' => 'pulse',
            'rubberBand' => 'rubberBand',
            'shake' => 'shake',
            'headShake' => 'headShake',
            'swing' => 'swing',
            'tada' => 'tada',
            'wobble' => 'wobble',
            'jello' => 'jello',

            'bounceIn' => 'bounceIn',
            'bounceInDown' => 'bounceInDown',
            'bounceInLeft' => 'bounceInLeft',
            'bounceInRight' => 'bounceInRight',
            'bounceInUp' => 'bounceInUp',
            'bounceOut' => 'bounceOut',
            'bounceOutDown' => 'bounceOutDown',
            'bounceOutLeft' => 'bounceOutLeft',
            'bounceOutRight' => 'bounceOutRight',
            'bounceOutUp' => 'bounceOutUp',

            'fadeIn' => 'fadeIn',
            'fadeInDown' => 'fadeInDown',
            'fadeInDownBig' => 'fadeInDownBig',
            'fadeInLeft' => 'fadeInLeft',
            'fadeInLeftBig' => 'fadeInLeftBig',
            'fadeInRight' => 'fadeInRight',
            'fadeInRightBig' => 'fadeInRightBig',
            'fadeInUp' => 'fadeInUp',
            'fadeInUpBig' => 'fadeInUpBig',
            'fadeOut' => 'fadeOut',
            'fadeOutDown' => 'fadeOutDown',
            'fadeOutDownBig' => 'fadeOutDownBig',
            'fadeOutLeft' => 'fadeOutLeft',
            'fadeOutLeftBig' => 'fadeOutLeftBig',
            'fadeOutRight' => 'fadeOutRight',
            'fadeOutRightBig' => 'fadeOutRightBig',
            'fadeOutUp' => 'fadeOutUp',
            'fadeOutUpBig' => 'fadeOutUpBig',

            'flipInX' => 'flipInX',
            'flipInY' => 'flipInY',
            'flipOutX' => 'flipOutX',
            'flipOutY' => 'flipOutY',

            'lightSpeedIn' => 'lightSpeedIn',
            'lightSpeedOut' => 'lightSpeedOut',

            'rotateIn' => 'rotateIn',
            'rotateInDownLeft' => 'rotateInDownLeft',
            'rotateInDownRight' => 'rotateInDownRight',
            'rotateInUpLeft' => 'rotateInUpLeft',
            'rotateInUpRight' => 'rotateInUpRight',
            'rotateOut' => 'rotateOut',
            'rotateOutDownLeft' => 'rotateOutDownLeft',
            'rotateOutDownRight' => 'rotateOutDownRight',
            'rotateOutUpLeft' => 'rotateOutUpLeft',
            'rotateOutUpRight' => 'rotateOutUpRight',

            'hinge' => 'hinge',
            'rollIn' => 'rollIn',
            'rollOut' => 'rollOut',

            'zoomIn' => 'zoomIn',
            'zoomInDown' => 'zoomInDown',
            'zoomInLeft' => 'zoomInLeft',
            'zoomInRight' => 'zoomInRight',
            'zoomInUp' => 'zoomInUp',
            'zoomOut' => 'zoomOut',
            'zoomOutDown' => 'zoomOutDown',
            'zoomOutLeft' => 'zoomOutLeft',
            'zoomOutRight' => 'zoomOutRight',
            'zoomOutUp' => 'zoomOutUp',

            'slideInDown' => 'slideInDown',
            'slideInLeft' => 'slideInLeft',
            'slideInRight' => 'slideInRight',
            'slideInUp' => 'slideInUp',
            'slideOutDown' => 'slideOutDown',
            'slideOutLeft' => 'slideOutLeft',
            'slideOutRight' => 'slideOutRight',
            'slideOutUp' => 'slideOutUp'
        );
    }
    private function getFontLine(){
        return array();
    }
}
