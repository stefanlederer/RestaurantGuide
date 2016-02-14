<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {

        return $this->render('AppBundle:templates:startseite.html.twig', array(
                'newOnes' => $this->getNewPlaces(),
                //'topRated' => $this->getTopRated(),
                'anonyms' => $this->getallNewPlaces()
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



    private function getNewPlaces() {

        $em = $this->getDoctrine()->getManager();;

        $newOne = $em
            ->getRepository('AppBundle:Places')
            ->findBy(array(), array('id' => 'DESC'),3);

        return $newOne;
    }

    private function getallNewPlaces() {
        $em = $this->getDoctrine()->getManager();;

        $newOne = $em
            ->getRepository('AppBundle:Places')
            ->findBy(array(), array('id' => 'DESC'), 12);

        return $newOne;
    }

    private function getRecommendedPlaces() {

    }
    private function getTopRated() {

        $em = $this->getDoctrine()->getManager();
        $topRated = $em->getRepository('AppBundle:Places')
            ->topRated();

        return $topRated;
    }

    private function getComments($id) {
        $em = $this->getDoctrine()->getManager();;

        $comments = $em
            ->getRepository('AppBundle:Bewertung')
            ->findBy(array('placesId' => $id), array('date' => 'DESC'));

        /*$em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository('AppBundle:Bewertung')
            ->getComments($id);*/

        return $comments;
    }

















    //get all features from place
    private function getFeatures($id) {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Places');
        $features = $repository->findOneBy( array('id' => $id));

        return $features;
    }

    //get all Places
    private function getallPlaces() {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Places');

        $places = $repository->findAll();

        return $places;
    }
    //Joins the Place with Bewertung
    /*private function joinPlaceBewertung() {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p
    FROM AppBundle:Product p
    WHERE p.price > :price
    ORDER BY p.price ASC'
        )->setParameter('price', '19.99');

        $products = $query->getResult();
    }*/
}