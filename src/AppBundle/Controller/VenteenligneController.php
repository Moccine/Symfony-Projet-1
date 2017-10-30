<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Entity\Venteenligne;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class VenteenligneController extends Controller
{
    /**
     * Finds and displays a venteenligne entity.
     *
     * @Route("vente-en-ligne/{slug}/{page}/{limit}", defaults={"page": 1, "limit": 5}, name="venteenligne_show",  requirements={"slug": "[a-zA-Zéèàêâ\-ôà\/]+"})
     * @Method("GET")
     */
    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limit = $request->get('limit');
        $page = $request->get('page');
        $repository = $em->getRepository('AppBundle:Category');
        $categorySlug = $request->get('slug');
        $category = $repository->findOneBySlug($categorySlug);

        $products = $repository->getCategory($categorySlug, $page, $limit);
        $maxPages = ceil($products->count() / $limit);

        return $this->render('venteenligne/venteenligne.html.twig',
            array('category' => $category,
                'products' => $products,
                'maxPages' => $maxPages,
                'page' => $page)
        );
    }

    /**
     * @Route("/vente-en-lignes", name="all_vente_en_lignes")
     */
    public  function getAllMarquesAction(){
        $rep=$this->getDoctrine()->getRepository(Venteenligne::class);
        $venteenlignes=$rep->findAll();
        return $this->render('venteenligne/index.html.twig',
            array( 'venteenlignes'=>$venteenlignes));
    }


}
