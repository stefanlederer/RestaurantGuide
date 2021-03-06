<?php

namespace AppBundle\Repository;

/**
 * BewertungRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BewertungRepository extends \Doctrine\ORM\EntityRepository
{
    public function getComments($id) {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
            ->select('p','c')
            ->from('AppBundle:Places','p')
            ->innerJoin('AppBundle:Bewertung','c')
            ->where('c.placesId = p.id');
        //return $query->getQuery()->getResult();
    }
}
