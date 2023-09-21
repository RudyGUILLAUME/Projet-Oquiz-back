<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("back/login", name="app_back_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        if (!$error == null) {            
            $message = "E-mail ou mot de passe invalide.";
            $this->addFlash('danger', $message);

            return $this->redirectToRoute('app_back_login');
        }
        
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('back/security/login.html.twig', [
            'last_username' => $lastUsername, 
            'error' => $error
        ]);
    }

    /**
     * 
     * @Route("/logout", name="app_back_logout")
     */
    public function logout(): void
    {
    }
}
