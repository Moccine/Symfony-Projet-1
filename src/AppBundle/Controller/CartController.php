<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/cart")
 */
class CartController extends Controller
{
    /**
     * @Route("/", name="index_cart")
     */
    public function index()
    {
        $session = $this->get('session');
        $cart= array();
        // Le panier virtuel a besoin des sessions, donc nous en ouvrons une.
        if ($session->has('cart')) {
            $cartSession = $session->get('cart');
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $productItemsId=[];
            $i = 0;
            foreach ($cartSession as $key => $value) {
                $productItemsId[$i] = $key;
                $i++;
            }
            $cart = $repository->getProductCollection($productItemsId);
        }
        return $this->render('cart/index.html.twig', array(
            'cart'=>$cart
        ));
    }



    private function getAllCart()
    {
        $session = $this->get('session');
        $cart = $session->get('cart');
        $array=[];
        $repository = $this->getDoctrine()->getRepository(Product::class);
        //$resulats=array();
        if (isset($cart)) {
            $i = 0;
            foreach ($cart as $key => $value) {
                $array[$i] = $key;
                $i++;
            }
        }
        return  $repository->getProductCollection($array)?$repository->getProductCollection($array):[];
    }




    /**
     * @Route("/add/{new_id}", name="add_to_cart", requirements={"new_id": "\d+"})
     */
    public function addToCart(Request $request)
    {
        //creation des variables courts
        $session = $this->get('session');
        $refererRoute = $request->server->get('HTTP_REFERER');

        $new = $request->get('new_id'); // produit à ajouter
        //on verifie que le panier exist

            $cart = $session->get('cart');
            $product = $this->getDoctrine()->getRepository(Product::class)->find($new);
            if ($cart and key_exists($new, $cart)) {
                $cart[$new]['quantity'] = intval($cart[$new]['quantity']) + 1;
                $totalprice=floatval($session->get('total_price')) +$product->getPrice();
                $session->set('total_price', $totalprice);
                $session->set('cart', $cart);
                $session->set('items', count($cart));
                $session->set('gat_all_cart', $this->getAllCart());

            } else {
                $cart[$new]['quantity'] = 1;
                $cart[$new]['price'] = $product->getPrice();
                $session->set('cart', $cart);
                $session->set('items', count($cart));
                $session->set('total_price', $product->getPrice());
                $session->set('gat_all_cart', $this->getAllCart());

            }

        //Ajout d'un nouveau produit

     return $this->redirect($refererRoute);
        //return $this->render('cart/addCart.html.twig');

    }

    public function calculateItems()
    {
        $session = $this->get('session');

        if ($session->has('cart')) {
            $cart = $session->get('cart');

        }

    }

    /**
     * @Route("/delete_cart", name="delete_cart")
     */
    public function deleteCart(Request $request)
    {
        $refererRoute = $request->server->get('HTTP_REFERER');
        $session = $this->get('session');

        if ($session->has('cart') or $session->has('total_price')
            or $session->has('items') or $session->has('get_all_cart') ) {
            $session->remove('cart');
            $session->remove('total_price');
            $session->remove('items');
            $session->remove('get_all_cart');
        }
        return $this->redirect($refererRoute);
    }

    /**
     * @Route("/delete_item/{delete_id}", name="delete_item")
     */
   public function deleteCartItem(Request $request){
       $refererRoute = $request->server->get('HTTP_REFERER');
       $deletedItemId=$request->get('delete_id');
       $session = $this->get('session');
       $cart=$session->get('cart');
       $items=intval($session->get('items'))-$cart[$deletedItemId]['quantity'];
       unset($cart[$deletedItemId]);
       $session->set('cart', $cart);
       $session->set('items', $items);

       return $this->redirect($refererRoute);
   }




    /* public function displayCart(){

    }

    public function  purchase(){

    }

    public function insert_order()
    {
   //Cette fonction ajoute
//toutes les informations relatives à la commande du client dans la base de données
    }
*/

}
