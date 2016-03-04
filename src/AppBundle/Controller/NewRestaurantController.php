<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Places;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class NewRestaurantController extends Controller
{
    /**
     * @Route("/neuesRestaurant", name="newRestaurant")
     */
    public function newRestaurantAction()
    {

        $request = Request::createFromGlobals();
        $restaurantName = $request->request->get('restaurantname');
        $restaurantStreet = $request->request->get('restaurantstreet');
        $restaurantStreetNumber = $request->request->get('restaurantstreetnum');
        $restaurantPLZ = $request->request->get('restaurantplz');
        $restaurantplace = $request->request->get('restaurantplace');
        $file = $request->files->get('restaurantImage'); //file
        $restaurantImg = $file->getClientOriginalName(); //Filename
        $north = $request->request->get('restaurantlng');
        $east = $request->request->get('restaurantlat');

        //get and proof image upload
        $targetDir = $this->get('kernel')->getRootDir() . '/../web/images';

        print_r($restaurantImg);

        if (strlen($restaurantName) > 0 && strlen($restaurantStreet) > 0 && strlen($restaurantStreetNumber) > 0
            && strlen($restaurantPLZ) > 0 && strlen($restaurantplace) > 0 && strlen($north) > 0 && strlen($east) > 0
        ) {

            $file->move($targetDir, $restaurantImg);

//                $place = new Places();
//
//                $place->setName($restaurantName);
//                $place->setStreet($restaurantStreet);
//                $place->setStreetnumber($restaurantStreetNumber);
//                $place->setPlz($restaurantPLZ);
//                $place->setCity($restaurantplace);
//                $place->setNorth($north);
//                $place->setEast($east);
//                $place->setImage("images/".$restaurantImg);
//
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($place);
//                $em->flush();

        }

        return $this->render('AppBundle:templates:newRestaurant.html.twig');

    }
}
