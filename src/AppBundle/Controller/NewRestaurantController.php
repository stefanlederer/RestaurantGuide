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
        $restaurantImg = $request->request->get('restaurantImage'); //Filename
        $file = $request->files->get('restaurantImage'); //file

        $north = "56,454646";
        $east = "25,1546213";

        //get and proof image upload
        $targetDir = $this->container->getParameter('kernel.root_dir') . '/../web/images';
        $targetFile = $targetDir . basename($restaurantImg); //
        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);


//        if (strlen($restaurantName) > 0 && strlen($restaurantStreet) > 0 && strlen($restaurantStreetNumber) > 0
//            && strlen($restaurantPLZ) > 0 && strlen($restaurantplace) > 0 && strlen($north) > 0 && strlen($east) > 0
//        ) {

//        if ($imageFileType = "jpg" && $imageFileType = "png" && $imageFileType = "jpeg"
//                    && $imageFileType = "gif"
//        ) {
//
//            $data = $file   ;
//            if ($data['attachment']->move($targetDir, $restaurantImg)) {
//
//            $place = new Places();
//
//            $place->setName($restaurantName);
//            $place->setStreet($restaurantStreet);
//            $place->setStreetnumber($restaurantStreetNumber);
//            $place->setPlz($restaurantPLZ);
//            $place->setCity($restaurantplace);
//            $place->setNorth($north);
//            $place->setEast($east);
//            $place->setImage("images/".$restaurantImg);
//
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($place);
//            $em->flush();
//            } else {
//                print_r("cannot move file");
//            }
//        }

        return $this->render('AppBundle:templates:newRestaurant.html.twig');
    }
}
