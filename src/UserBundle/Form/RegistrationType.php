<?php
/**
 * Created by PhpStorm.
 * User: Momo Junior
 * Date: 16/10/2017
 * Time: 14:58
 */

namespace UserBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname');
        $builder->add('lastname');
        $builder->add('civility', ChoiceType::class, array(
            'choices'  => array(
                'Homme' => 'H',
                'Femme' => 'F',
                ),
        ));
    }

   public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

}