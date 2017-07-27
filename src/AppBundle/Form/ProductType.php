<?php

namespace AppBundle\Form;

use AppBundle\Entity\Image;
use AppBundle\Service\ProductManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    private $em;
    private $productManager;
    private $marques;
    private $category;


    public function __construct(EntityManagerInterface $entityManager, ProductManager $productManager)
    {
        $this->em = $entityManager;
        $this->productManager = $productManager;
        $this->category = $this->productManager->getCategory();
        $this->marques = $this->productManager->getMarque();
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('name')
            ->add('price', MoneyType::class)
            ->add('images', ImageType::class, array(
                'data_class' => null
            ))
            ->add('caracterisques')
            ->add('category', EntityType::class, array(
                'class'=>'AppBundle:Category',
                "choices" => $this->category
            ))
            ->add('marque', EntityType::class, array(
                'class'=>'AppBundle:Marque',
                "choices" => $this->marques))
            ->add('description', TextareaType::class);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_product';
    }


    private function getMarque($array)
    {
        $tab = array();
   foreach ($array as $key=>$value){
       $tab[$value->getName()]=$value;
       //$tab[$value->getName()]=$value;
   }
        return $tab;
    }
    public function getCategory($array){
        $tab = array();
        foreach ($array as $key=>$value){
            //$value=$array[$i];
            $tab[$value->getName()]=$value->getName();

        }
        return $tab;
    }

}
