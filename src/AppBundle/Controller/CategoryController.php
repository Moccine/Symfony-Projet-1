<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class CategoryController extends Controller
{
    /**
     * Lists all category entities.
     *
     * @Route("category/", name="category_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AppBundle:Category')->findAll();

        return $this->render('layouts/materialCatalogs.html.twig',
            array(
                'categories' => $categories,
            ));
    }

    /**
     * Creates a new category entity.
     *
     * @Route("category/new", name="category_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm('AppBundle\Form\CategoryType', $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('category_show', array('id' => $category->getId()));
        }
        return $this->render('category/new.html.twig', array(
            'category' => $category,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a category entity.
     *
     * @Route("category/{slug}/{page}/{limit}", defaults={"page": "1", "limit": 5}, name="category_show",  requirements={"slug": "[a-zA-Zéèàêâ\-ôà\/]+"})
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

        return $this->render('category/category.html.twig',
            array('category' => $category,
                'products' => $products,
                'maxPages' => $maxPages,
                'page' => $page)
        );
    }

    /**
     * Displays a form to edit an existing category entity.
     *
     * @Route("category/{id}/edit", name="category_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Category $category)
    {
        $deleteForm = $this->createDeleteForm($category);
        $editForm = $this->createForm('AppBundle\Form\CategoryType', $category);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_edit', array('id' => $category->getId()));
        }

        return $this->render('category/edit.html.twig', array(
            'category' => $category,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a category entity.
     *
     * @Route("category/{id}", name="category_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Category $category)
    {
        $form = $this->createDeleteForm($category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($category);
            $em->flush();
        }

        return $this->redirectToRoute('category_index');
    }

    /**
     * Creates a form to delete a category entity.
     *
     * @param Category $category The category entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Category $category)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('category_delete', array('id' => $category->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }


    public function menuCategoryAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AppBundle:Category')->findAll();
        return $this->render('layouts/materialCatalogs.html.twig', array(
            'categories' => $categories,
        ));
    }

    /**
      * @Route("/categories", name="all_category")
     */
    public function getAllCategory(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        return $this->render('category/index.html.twig', array(
            'categories' => $categories,
        ));


    }
}
