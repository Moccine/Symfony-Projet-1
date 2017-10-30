<?php

namespace AppBundle\Repository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * VenteenligneRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VenteenligneRepository extends \Doctrine\ORM\EntityRepository
{
    public function getCategory($slug, $currentPage, $limit)
    {
        $em=$this->getEntityManager();

        $qb = $em->createQuery("SELECT p FROM AppBundle:Product p");
        //$qb->setParameter('slug', $slug);

        $paginator=$this->paginate($qb, $currentPage, $limit);
        return $paginator;
    }
    public  function paginate($dql, $page, $limit){
        $paginator= new Paginator($dql);
        $paginator->getQuery()
            ->setFirstResult($limit*($page-1))
            ->setMaxResults($limit);
        return $paginator;
    }

/*    public  function getVenteenligneMenuItems(){

        $qb=$this->createQueryBuilder('c');
        $qb->join()
        return $qb->getResult();
    }*/

}