<?php

namespace AppBundle\Repository;

/**
 * PlacesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlacesRepository extends \Doctrine\ORM\EntityRepository
{
    public function topRated()
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
            ->select('c')
            ->from('AppBundle:Bewertung', 'c')
//            ->leftJoin('AppBundle:Bewertung', 'c', 'WITH', 'p.id = c.placesId')
            ->orderBy('c.placesId', 'ASC');

        $rating = $query->getQuery()->getArrayResult();

        $ordered = array();
        $quantity = 0;
        $rate = 0;
        for ($i = 0; $i < count($rating); $i++) {
            if (($i + 1) < count($rating)) {
                if ($rating[$i + 1]['placesId'] == $rating[$i]['placesId']) {
                    $rate = $rating[$i]['bewertungen'] + $rate;
                    $quantity = $quantity + 1;
                } else {
                    $rate = $rating[$i]['bewertungen'] + $rate;
                    $quantity = $quantity + 1;
                    $average = $rate / $quantity;
                    $ordered[$rating[$i]['placesId']] = $average;
                    $rate = 0;
                    $quantity = 0;
                }
            } else {
                if ($rating[$i - 1]['placesId'] == $rating[$i]['placesId']) {
                    $rate = $rating[$i]['bewertungen'] + $rate;
                    $quantity = $quantity + 1;
                    $average = $rate / $quantity;
                    $ordered[$rating[$i]['placesId']] = $average;
                } else {
                    $rate = $rating[$i]['bewertungen'];
                    $quantity = 1;
                    $average = $rate / $quantity;
                    $ordered[$rating[$i]['placesId']] = $average;
                }
            }
        }
        arsort($ordered);

        $key = array_keys($ordered);
        $rec1 = $key[0];
        $rec2 = $key[1];
        $rec3 = $key[2];

        $query2 = $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Places', 'p')
            ->leftJoin('AppBundle:Bewertung', 'c', 'WITH', 'p.id = c.placesId')
            ->where('c.placesId = :rec1')
            ->orWhere('c.placesId = :rec2')
            ->orWhere('c.placesId = :rec3')
            ->setParameter('rec1', $rec1)
            ->setParameter('rec2', $rec2)
            ->setParameter('rec3', $rec3);

        $places = $query2->getQuery()->getResult();

        return $places;
    }

    public function recommended()
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
            ->select('c')
            ->from('AppBundle:Bewertung', 'c')
//            ->leftJoin('AppBundle:Places', 'p', 'WITH', 'p.id = c.placesId')
            ->orderBy('c.placesId', 'ASC');

        $rating = $query->getQuery()->getArrayResult();

        $placesId = array();
        for ($i = 0; $i < count($rating); $i++) {
            $placesId[$i] = $rating[$i]['placesId'];
        }

        $values = array_count_values($placesId);
        arsort($values);
        $popular = array_slice(array_keys($values), 0, 5, true);

//        print_r($popular);

        $rec1 = $popular[0];
        $rec2 = $popular[1];
        $rec3 = $popular[2];

        $query2 = $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Places', 'p')
            ->leftJoin('AppBundle:Bewertung', 'c', 'WITH', 'p.id = c.placesId')
            ->where('c.placesId = :rec1')
            ->orWhere('c.placesId = :rec2')
            ->orWhere('c.placesId = :rec3')
            ->setParameter('rec1', $rec1)
            ->setParameter('rec2', $rec2)
            ->setParameter('rec3', $rec3);

        $places = $query2->getQuery()->getResult();

//        print_r($places);

        return $places;
    }
}
