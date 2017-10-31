<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 30/07/2017
 * Time: 11:38
 */

namespace AppBundle\Service;


use AppBundle\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class CategoryManager
{

    private $em;
    private $repository;
    private $tokenStorage;
    private $session;
    private $user;
    private $form;


    public function __construct(EntityManagerInterface $entityManager,
                                TokenStorageInterface $tokenStorage,
                                SessionInterface $session)
    {
        $this->em = $entityManager;
        $this->tokenStorage = $tokenStorage;
        $this->user = $tokenStorage->getToken()->getUser();
        $this->session = $session;

    }

    public function getCategory()
    {
        $repo = $this->em->getRepository(Category::class);
        $categories = $repo->findAll();
        return $categories;
    }

    public function setRepository($repository)
    {
        $this->repository = $repository;
        return $this;
    }

    public function setForm($form)
    {
        $this->form = $form;
        return $this;
    }
}