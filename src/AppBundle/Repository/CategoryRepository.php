<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $slug
     * @param $currentPage
     * @param $limit
     * @return Paginator
     */
    public function getCategory($slug, $currentPage, $limit)
    {
        $em = $this->getEntityManager();

        $qb = $em->createQuery("SELECT p FROM AppBundle:Product p 
                                JOIN p.category c 
                                WHERE c.slug =:slug");
        $qb->setParameter('slug', $slug);
        $paginator = $this->paginate($qb, $currentPage, $limit);
        return $paginator;
    }



    /**
     * @param $dql
     * @param $page
     * @param $limit
     * @return Paginator
     */
    public function paginate($dql, $page, $limit)
    {
        $paginator = new Paginator($dql);
        $paginator->getQuery()
            ->setFirstResult($limit * ($page - 1))
            ->setMaxResults($limit);
        return $paginator;
    }

    /**
     * recupère les items du menu vente en ligne
     * @return array
     */
    public function getVenteenligneMenuItems()
    {
        $qb = $this->createQueryBuilder('c');
        $qb->join('c.products', 'p')
            ->where('p.venteenligne=?1')
            ->distinct(true)
            ->setParameter(1, 1);
        return $qb->getQuery()->getResult();
    }
}