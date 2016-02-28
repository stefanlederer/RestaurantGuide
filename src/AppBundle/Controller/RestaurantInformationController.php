<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bewertung;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

class RestaurantInformationController extends Controller
{
    /**
     * @Route("/food", name="restaurant")
     */
    public function restaurantAction()
    {

        //adding comment
        $userId = new User();
        $userId = $this->getUser()->getId();

        $placesId = $_GET["id"];

        $time = new \DateTime();
        $time->format('Y-m-d \O\n H:i:s');

        $request = Request::createFromGlobals();
        $comment = $request->request->get("myComment");
//        $bewertung = $request->request->get("rating");
        $bewertung = 5;

        if (strlen($comment) > 0) {
            $rating = new Bewertung();

            $rating->setUserId($userId);
            $rating->setPlacesId($placesId);
            $rating->setKommentar($comment);
            $rating->setBewertungen($bewertung);
            $rating->setDate($time);

            $em = $this->getDoctrine()->getManager();
            $em->persist($rating);
            $em->flush();
        }



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
}
