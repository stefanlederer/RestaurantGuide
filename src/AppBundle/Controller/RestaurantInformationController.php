<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RestaurantInformationController extends Controller
{
    /**
     * @Route("/food", name="restaurant")
     */
    public function restaurantAction()
    {
        //get information, id's, ... of the restaurtant
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Places');
        $features = $repository->findOneBy( array('id' => $_GET["id"]));

        //get comment of restaurant
        $em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository('AppBundle:Bewertung')->getComments($_GET["id"]);

        return $this->render('AppBundle:templates:restaurant.html.twig', array(
            'features' => $features,
            'comments' => $comments
        ));
    }
}
