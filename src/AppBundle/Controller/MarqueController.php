<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Marque;
use AppBundle\Form\MarqueType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class MarqueController extends Controller
{
    /**
     * @Route("marque/", name="index_marque")
     */
    public  function indexAction(){
        $rep=$this->getDoctrine()->getRepository(Marque::class);
        $marques=$rep->findAll();
        return $this->render('marque/allMarquesList.html.twig',
            array( 'marques'=>$marques));
    }


    /**
     * Finds and displays a marque entity.
     *
     * @Route("marque/{slug}/{page}/{limit}", defaults={"page": 1, "limit": 5}, name="marque_show",  requirements={"slug": "[a-zA-Zéèàêâ\-ôà\/]+"})
     * @Method("GET")
     */
    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limit = $request->get('limit');
        $page=$request->get('page');
        $repository = $em->getRepository('AppBundle:Marque');
        $marqueSlug = $request->get('slug');
        $marque = $repository->findOneBySlug($marqueSlug);

        $products = $repository->getMarques($marqueSlug, $page, $limit);
        $maxPages = ceil($products->count() / $limit);

        return $this->render('marque/marque.html.twig',
            array('marque' => $marque,
                'products' => $products,
                'maxPages' => $maxPages,
                'page' => $page)
        );
    }

    /**
     * @Route("marque/add", name="add_marque")
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


    /**
     * @Route("/marques", name="all_marques")
     */
    public  function getAllMarquesAction(){
        $rep=$this->getDoctrine()->getRepository(Marque::class);
        $marques=$rep->findAll();
        return $this->render('marque/index.html.twig',
            array( 'marques'=>$marques));
    }

}


