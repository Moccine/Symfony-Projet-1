<?php

namespace UserBundle\Controller;

use AppBundle\Entity\Product;
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
     * @Route("/products/{page}/{limit}", defaults={"page": "1", "limit": 5}, name="catelogue_products",  requirements={"slug": "[a-zA-Zéèàêâ\-ôà\/]+"})
     * @Method("GET")
     */
    public  function catalogueProduits(Request $request)
        {
            $em = $this->getDoctrine()->getManager();
            $limit = $request->get('limit');
            $page = $request->get('page');
            $repository = $em->getRepository('AppBundle:Product');
            $products = $repository->getAllProducts($page, $limit);
            $maxPages = ceil($products->count() / $limit);

            return $this->render('dashboard/catalogue/products.html.twig',
                array(
                    'products' => $products,
                    'maxPages' => $maxPages,
                    'page' => $page)
            );
        }


}
