<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Phone;
use AppBundle\Form\PhoneType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/phone")
 */
class PhoneController extends Controller
{
    /**
     * @Route("/add", name="add_phone")
     */
    public  function addAction(Request $request){
        $phone=new Phone();
        $form=$this->createForm(PhoneType::class, $phone);
        $form->handleRequest($request);
        if($form->isValid() and $form->isSubmitted()){

        }
        return $this->render('phone/addPhone.html.twig',
            array( 'form'=>$form->createView()));
    }

}
