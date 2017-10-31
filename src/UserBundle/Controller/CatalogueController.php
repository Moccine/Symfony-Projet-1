<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CatalogueController
 * @package UserBundle\Controller
 * @Route("profile/catalogue")
 */
class CatalogueController extends Controller
{
    /**
     * Finds and displays a category entity.
     *
     * @Route("/products/{page}/{limit}", defaults={"page": "1", "limit": 5}, name="catelogue_products")
     * @Method("GET")
     */
    public  function catalogueProduits(Request $request)
        {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('AppBundle:Product');
            $products=$repository->findAll();
            return $this->render('dashboard/catalogue/products.html.twig',
                array('products' => $products)  );
        }


}
