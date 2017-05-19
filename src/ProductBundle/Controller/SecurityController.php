<?php
/**
 * Created by PhpStorm.
 * User: pierre.dl21
 * Date: 17/05/2017
 * Time: 14:54
 */

namespace ProductBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{

    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // @var AuthenticationException $error (Erreur d'authentification)
        $error = $authenticationUtils->getLastAuthenticationError();

        // Dernier nom d'utilisateur saisi
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('ProductBundle:Security:login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
    ));

    }
}