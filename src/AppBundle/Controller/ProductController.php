<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Image;
use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use AppBundle\Service\ImagesManager;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\ProductManager;

/**
  * @Route("/product")
 */
class ProductController extends Controller
{

    public  function indexAction(){
        return;
    }

    /**
     * @Route("/add", name="add_product")
     */
    public  function addAction(ProductManager $serviceProduct,
                               Request $request,
                               ImagesManager $imagesManager){
        $product=new Product();
        /**@var ProductManager **/
    $form=$this->createForm(ProductType::class, $product);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()  ){
        $image=new Image();
        $product=$form->getData();
        /** @var ArrayCollection $imageUpload */
        $imageUpload=$product->getImages();
        dump($product);
        if(!$imageUpload->isEmpty()){
            $file=$imageUpload->current();
            $fileName = $imagesManager->upload($file);
            /*$image->setAlt($datas->getAlt());
            $image->setUser($this->getUser());
            $image->setFilename($fileName);
            $em->persist($image);*/
        }

    }
        return $this->render('product/addProduct.html.twig',
            array( 'form'=>$form->createView()));
    }
}
