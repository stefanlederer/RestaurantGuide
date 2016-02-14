<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

class AccountController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function registerAction()
    {
        $request = Request::createFromGlobals();
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        if (!empty($username)) {
            $user = new User();
            $user->setUsername($username);
            $user->setPassword(password_hash($password, PASSWORD_BCRYPT, array('cost' => 12)));
            $role = array('ROLE_USER');
            $user->setRoles($role);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

        }

        return $this->render('AppBundle:Account:register.html.twig', array(// ...
        ));
    }

}
