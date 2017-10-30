<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Promo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PromotionController extends Controller
{
    /*
     * @Route("/promotions", name="all_promotion");
     */
    public  function indexAction(){
        $rep=$this->getDoctrine()->getRepository(Promo::class);
        $promotions=$rep->findAll();
        return $this->render('promotion/index.html.twig',
            array( 'promotions'=>$promotions));
    }


}
