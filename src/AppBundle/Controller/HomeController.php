<?php

namespace AppBundle\Controller;

use AppBundle\Service\ProductManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public  function indexAction(ProductManager $productManager){

        $marque=$productManager->getMarque();
        return $this->render('home/index.html.twig',
            array('marques'=>$marque));    }

    public  function getMenus(ProductManager $productManager){
        $marque=$productManager->getMarque();
        return $this->render('home/index.html.twig',
               array('marques'=>$marque));
    }
}
