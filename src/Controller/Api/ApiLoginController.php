<?php

namespace App\Controller\Api;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class ApiLoginController extends AbstractController
{
    /** 
     * @Route("/api/login", name="api_login", methods={"POST"})
    */
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPassword, JWTTokenManagerInterface $jwtManager): Response
    {   
        //* On récupère le contenu de la requête 
        $json = $request->getContent();

        //* On récupère nos données du $json en tableau associatif
        $jsonData = json_decode($json, true);

        //* On récupère l'email envoyé dans la requête depuis le tableau $jsonData
        $email = $jsonData['email'];

        //* Recherche l'utilisateur correspondant à l'email dans la base de données
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        //* Vérifie si l'utilisateur existe et compare les mots de passe 
        if (!$user || !$userPassword->isPasswordValid($user, $jsonData['password'])) {
            
            return $this->json(['message' => 'Votre email ou votre mot de passe est invalide'], 401);
        }

        //* L'authentification est réussie, création d'un token JWT pour $user
        $token = $jwtManager->create($user);

        //* On retourne l'email, l'username, et le token créé pour ce dernier  
        return $this->json([
            'email'    => $user->getEmail(),
            'username' => $user->getUsername(),
            'id'       => $user->getId(),
            'token'    => $token
        ]);
    }

    /**
     * Logout
     * @Route("/api/logout", name="api_logout")
     */
    public function logout()
    {
        // Ce code ne sera jamais exécuté
        // le composant de sécurité va intercepter la requête avant.
    }   
}






