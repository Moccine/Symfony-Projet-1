<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Marque;
use AppBundle\Entity\Product;
use AppBundle\Entity\Promo;
use AppBundle\Entity\Venteenligne;
use AppBundle\Service\ProductManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public  function indexAction(ProductManager $productManager){
       $session=$this->get('session');
        if(!$session->has('currency')){
            $session->set('currency', array( 'currency'=>'EUR',
                'symbol-currency'=>'€' ));
        }


        $marque=$productManager->getMarque();
        $repository=$this->getDoctrine()
                            ->getRepository(Product::class);
        $product=$repository->getLastProduct(10);
        return $this->render('home/index.html.twig',
            array('marques'=>$marque,
                'products'=>$product));    }

    public  function getMenus(ProductManager $productManager){
        $marque=$productManager->getMarque();
        return $this->render('home/index.html.twig',
               array('marques'=>$marque));
    }

    /**
     * @Route("/megamenu", name="mega_menu_items")
     */
    public  function  menuItemsAction(){
        $categoryRepo=$this->getDoctrine()->getRepository(Category::class);
        $venteenligne=$categoryRepo->getVenteenligneMenuItems();
        return $this->render('home/venteenligne.html.twig',
            array(
                'venteenligne'=>$venteenligne)
        );
    }
    /**
     * @Route("/category_menu", name="category_menu_items")
     */
    public  function  categoryMenuItemsAction(){
        $repoCategory=$this->getDoctrine()->getRepository(Category::class);
        $category=$repoCategory->findAll();
        return $this->render('home/categorymenuitem.html.twig',
            array(
                'category'=>$category
            )        );
    }
    /**
     * @Route("/marque_menu", name="marque_menu_items")
     */
    public  function  marqueMenuItemsAction(){
        $repoMarque=$this->getDoctrine()->getRepository(Marque::class);
        $marque=$repoMarque->findAll();
        return $this->render('home/cataloguemateriel.html.twig',
            array('marque'=>$marque
            )        );
    }

    /*public  function setSlieder(Request $request){
        return $this->render('');
    }*/
    /**
     * @Route("/search", name="product_search")
     */
    public function searchAction(Request $request){
        $repository=$this->getDoctrine()->getRepository(Product::class);
        $searchResult=null;
        if ($request->get('product_search')){
            $searchResult=$repository->getSearchResult($request->get('product_search'));
        }

        return $this->render('home/search.html.twig', ['searchResult'=>$searchResult]);
    }

    /**
     * @Route("/change-currency/{currency}/{symbol-currency}", name="change_currency")
     */
    public  function changeCurrency(Request $request){
        $session=$this->get('session');

        if($session->has('currency')){
            $session->set('currency',
                array(
                   'currency'=> $request->get('currency') ,
                   'symbol-currency'=> $request->get('symbol-currency')
                )
            );
        }
        $refererRoute=$request->server->get('HTTP_REFERER');
        return $this->redirect($refererRoute);
    }

    /**
     * @Route("/lastpromo")
     */
    public  function nextPromoAction(){
        $repository=$this->getDoctrine()->getRepository(Promo::class);
        $result=$repository->getLastPromo();
        return $this->render('/home/nextPromo.html.twig',
            array('nextPromo'=>$result));
    }

}
