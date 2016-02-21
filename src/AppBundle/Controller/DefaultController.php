<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Bewertung;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();;

        //get all Places
        $allPlaces = $em
            ->getRepository('AppBundle:Places')
            ->findBy(array(), array('id' => 'DESC'), 12);

        //get new Places
        $newPlaces = $em
            ->getRepository('AppBundle:Places')
            ->findBy(array(), array('id' => 'DESC'),3);

        //get top Rated Places
        $topRated = $em->getRepository('AppBundle:Places')
            ->topRated();

        //get recommended Places
        $recommended = $em->getRepository('AppBundle:Places')
            ->recommended();

        return $this->render('AppBundle:templates:startseite.html.twig', array(
                'newOnes' => $newPlaces,
                'topRated' => $topRated,
                'recommended' => $recommended,
                'anonyms' => $allPlaces
            )
        );
    }

    /**
     * @Route("/food", name="restaurant")
     */
    public function restaurantAction()
    {
        $feature = $this->getFeatures($_GET["id"]);

        $comments = $this->getComments($_GET["id"]);

        return $this->render('AppBundle:templates:restaurant.html.twig', array(
            'features' => $feature,
            'comments' => $comments
        ));
    }

    /**
     * @Route("/meineBewertung", name="bewertung")
     */
    public function bewertungAction() {
        return $this->render('AppBundle:templates:bewertung.html.twig');
    }

    /**
     * @Route("/neuesRestaurant", name="newRestaurant")
     */
    public function newRestaurantAction() {
        return $this->render('AppBundle:templates:newRestaurant.html.twig');
    }

    private function getComments($id) {

        $em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository('AppBundle:Bewertung')->getComments($id);

        return $comments;
    }

    //get all features from place
    private function getFeatures($id) {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Places');
        $features = $repository->findOneBy( array('id' => $id));

        return $features;
    }
}