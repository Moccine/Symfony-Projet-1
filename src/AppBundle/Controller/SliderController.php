<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Slider;
use AppBundle\Form\SliderType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SliderController
 * @package AppBundle\Controller
 * @Route("/slider")
 */
class SliderController extends Controller
{
    public  function index(){
        return $this->render('slider/index.html.twig');
    }

    /**
     * @Route("/add", name="add_slider")
     */
    public  function addSlider(Request $request){
        //$slider=new Slider();
        $form=$this->createForm(SliderType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()){
          $em=$this->getDoctrine()->getManager();
          $em->persist($form->getData());
          $em->flush();
      }
        return $this->render('dashboard/modules/slider/addslider.html.twig',
            array(
                'form'=>$form->createView()
            ));
    }
}
