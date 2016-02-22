<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bewertung;
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
        $features = $repository->findOneBy(array('id' => $_GET["id"]));

        //get comment of restaurant
        $em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository('AppBundle:Bewertung')->getComments($_GET["id"]);

        return $this->render('AppBundle:templates:restaurant.html.twig', array(
            'features' => $features,
            'comments' => $comments
        ));
    }

    /**
     * @Route("/food", name="addedRating")
     */
    public function addedRating()
    {
        $userId = $this->get('security.token_storage')->getToken()->getUserId();
        $placesId = $_GET["userId"];
        $time = new \DateTime();
        $time->format('H:i:s \O\n Y-m-d');

        $request = Request::createFromGlobals();
        $comment = $request->request->get("myComment");
//        $rating = $request->request->get("rating");

        if (strlen($comment) > 0) {
            $rating = new Bewertung();

            $rating->setUserId($userId);
            $rating->setPlacesId($placesId);
            $rating->setKommentar($comment);
//            $rating->setBewertungen($rating);
            $rating->setDate($time);

            $em = $this->getDoctrine()->getManager();
            $em->persist($rating);
            $em->flush();
        }
        else {
            print "error-comment!?";
        }
    }
}
