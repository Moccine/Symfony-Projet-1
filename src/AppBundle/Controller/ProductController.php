<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use AppBundle\Service\ImagesManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\ProductManager;

/**
 * @Route("/product")
 */
class ProductController extends Controller
{
    /**
     * @Route("/", name="index_product")
     */
    public function indexAction()
    {
        $session = $this->get('session');


        dump($session->get('cart'));
        return $this->render('product/index.html.twig', array('product' => array()));
    }

    /**
     * @Route("/add", name="add_product")
     */
    public function addAction(ProductManager $serviceProduct,
                              Request $request,
                              ImagesManager $imagesManager)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($form->isSubmitted() and $form->isValid()) {
            /**@var Product $product **/
            $product = $form->getData();
            $product->setSlug($product->getName());
            $em->persist($product);
            $em->flush();
        }
        return $this->render('dashboard/catalogue/addProduct.html.twig',
            array('form' => $form->createView()));
    }

    /**
     * @Route("/{id}", defaults={"id"="1"}, name="single_product",  requirements={"id": "\d+"})
     */
    public function singleProduct(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getRepository(Product::class);
        $singleProduct = $em->find($id);
        $prodsim = $em->getsimilarProducts($singleProduct);
        return $this->render('product/singleProduct.html.twig',
            ['singleProduct' => $singleProduct, 'prodSims' => $prodsim]);
    }

    /**
     * @Route("/quick_view",  name="product_quickView")
     */
    public function quickView(Request $request)
    {

        return $this->render('layouts/content/modal_quik_view/quick_view.html.twig');
    }
    /**
     * @Route("/quick_view",  name="product_quickView")
     */
    public function productsByCategory($Request)
    {

    }
    /**
     * @Route("/product/edit/{slug}", defaults={"slug": "1"}, name="product_edit")
     */
    public function EditProduct($Request)
    {

    }
    /**
     * @Route("/product/remove/{slug}", defaults={"slug": "1"}, name="product_remove")
     */
    public function RemoveProduct($Request)
    {

    }

}
