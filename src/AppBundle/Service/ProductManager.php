<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 16/07/2017
 * Time: 02:07
 */

namespace AppBundle\Service;


use AppBundle\Entity\Category;
use AppBundle\Entity\Marque;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ProductManager
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
        $this->em=$entityManager;
        $this->tokenStorage=$tokenStorage;
        $this->user=$tokenStorage->getToken()->getUser();
        $this->session=$session;

    }
  public  function getMarque(){
        $repo=$this->em->getRepository(Marque::class);
        return $repo->findAll();
  }
  public  function getCategory(){
      $repo=$this->em->getRepository(Category::class);
      return $repo->findAll();
  }
}