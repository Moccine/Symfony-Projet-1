<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Marque;
use AppBundle\Form\MarqueType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/marque")
 */
class MarqueController extends Controller
{

    public  function indexAction(){
        $rep=$this->getDoctrine()->getRepository(Marque::class);
        $marques=$rep->findAll();
        return $this->render('marque/allMarquesList.html.twig',
            array( 'marques'=>$marques));
    }
    /**
     * @Route("/add", name="add_marque")
     */
    public  function addAction(Request $request){
        $address=new Marque();
        $form=$this->createForm(MarqueType::class, $address);
        $form->handleRequest($request);
        if($form->isValid() and $form->isSubmitted()){

        }
        return $this->render('marque/addMarque.html.twig',
            array( 'form'=>$form->createView()));
    }
}
