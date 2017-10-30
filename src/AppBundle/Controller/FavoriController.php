<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Favoriproduct;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/favoris")
 */
class FavoriController extends Controller
{
    /**
    * @Route("/addfavori/{id}", requirements={"id": "\d+"})
     */
    public function addFavoris(Request $request, Product $product){
       $favori=new Favoriproduct();
       $favori->setProduct($product);
       $favori->setUser($this->getUser());
       $em=$this->getDoctrine()->getManager();
       $em->persist($favori);
       $em->flush();
    }

}
