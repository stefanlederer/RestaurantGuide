<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NewRestaurantController extends Controller
{
    /**
     * @Route("/neuesRestaurant", name="newRestaurant")
     */
    public function newRestaurantAction() {
        return $this->render('AppBundle:templates:newRestaurant.html.twig');
    }
}
