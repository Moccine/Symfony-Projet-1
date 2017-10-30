<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Form\AddressType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/address")
 */
class AddressController extends Controller
{

    /**
     * @Route("/add", name="add_adress")
     */
    public  function addAction(Request $request){
        $address=new Address();
        $form=$this->createForm(AddressType::class, $address);
        $form->handleRequest($request);
        if($form->isValid() and $form->isSubmitted()){

        }
        return $this->render('address/addAddress.html.twig',
            array( 'form'=>$form->createView()));
    }
}
