<?php

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Repository\UserRepository;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class ApiUserController extends AbstractController
{
    /**
     * Récupère la liste de tous les users
     * @Route("/api/user", name="app_api_user_list", methods={"GET"})
     */
    public function list(UserRepository $userRepository): Response
    {
        //* On récupère nos données grâce au findAll dans notre $userRepository 
        //* Qu'on sérialise grâce à la fonction json du AbstractController 
        //* On retourne un code 200 
        //* On récupère uniquement les données du groupe user:read
        return $this->json($userRepository->findAll(), 200, ['groups' => 'user:read'], ['groups' => 'user:read']);
    }

    /**
     * Récupère un user via son id 
     * @Route("/api/user/{id<\d+>}", name="app_api_user_get_item", methods={"GET"})
     */
    public function find(User $user = null): Response
    {
        //* Si le user = null alors l'utilisateur (l'id) n'existe pas, on retourne donc une erreur 404 avec message
        if ($user === null) {
            return $this->json(['error' => true, 'message' => "L'utilisateur demandé n'existe pas"], 404, [], []);
        }
        //* Retourne au format JSON les données, le code OK 200, et les données sélectionnés dans les entités via 'groups'
        return $this->json($user, 200, ['groups' => 'user:read'], ['groups' => 'user:read']);
    }

    /**
     * Créer un user 
     * @Route("/api/user", name="app_api_user_create", methods={"POST"})
     */
    public function create(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, ValidatorInterface $validator, UserPasswordHasherInterface $passwordHasher)
    {   
        //* on récupère le contenu de la requête HTTP grâche à Request
        $json = $request->getContent();

        //* on essaie 
        try {
            //* on désérialise les données envoyées en JSON vers le type attendu par notre BDD
            $user = $serializer->deserialize($json, User::class, 'json');

            $userPassword = $user->getPassword();
            $hashedPassword = $passwordHasher->hashPassword($user, $userPassword);

            $user->setPassword($hashedPassword);
            $user->setRoles(["ROLE_USER"]);
            $user->setCreatedAt(new \DateTime());

            //* on vérifie bien que toutes les données nécessaires à la création seront bien présentes (NotBlank, Unique etc...)
            $errors = $validator->validate($user);

            //* s'il y a une erreur on retourne un code Bad Request 400
            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }

            //* si pas d'erreur on persist notre $user et on flush en BDD 
            $entityManager->persist($user);
            $entityManager->flush();

            //* Retourne au format JSON les données nouvellement entrées dans $user, le code Create 201, 
            //* et les données sélectionnés dans les entités via 'groups'
            return $this->json($user, 201, ['groups' => 'user:create'], ['groups' => 'user:create']);

          //*  si autre erreur que le validate (syntaxe par ex.) on retourne un message + code Bad Request 400
        } catch (NotEncodableValueException $message) {
            return $this->json([
                'status' => 400,
                'message' => $message->getMessage()
            ], 400);
        }
    }

    /**
     * Modifier un user 
     * @Route("/api/user/{id<\d+>}", name="app_api_user_edit", methods={"PATCH"})
     */
    public function edit($id, Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, ValidatorInterface $validator, UserPasswordHasherInterface $passwordHasher)
    {   
        //* on récupère notre repository User grâce à l'EntityManager, puis on récupère l'id du user à modifier grâce à find()
        $user = $entityManager->getRepository(User::class)->find($id);

        //* si l'utilisateur n'existe pas on renvoie une erreur 404
        if(!$user) {
            return $this->json(['error' => true, 'message' => "L'utilisateur demandé n'existe pas"], 404, [], []);
        }

        //* on récupère le contenu de la requête HTTP grâce à Request
        $json = $request->getContent();
        
        //* on essaie 
        try {
            //* on désérialise les données envoyées en JSON pour notre modification vers le type attendu par notre BDD
            $userUpdated = $serializer->deserialize($json, User::class, 'json');
            
            // Pour le moment côté front on ne peut changer que le username et la picture d'un user depuis la page de profil
            // $hashedPassword = $passwordHasher->hashPassword($userUpdated, $userUpdated->getPassword());

            //* On modifie les données avec les setters
            $user->setUsername($userUpdated->getUsername());
            // $user->setPassword($hashedPassword);
            $user->setPicture($userUpdated->getPicture());
            // $user->setEmail($userUpdated->getEmail());
            $user->setUpdatedAt(new \DateTime());

            //* on vérifie bien que toutes les données nécessaires à la création seront bien présentes (NotBlank, Unique etc...)
            $errors = $validator->validate($user);

            //* s'il y a une erreur on retourne un code Bad Request 400
            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }

            //* si pas d'erreur on flush la modification en BDD 
            $entityManager->flush();

            //* Retourne au format JSON les données nouvellement entrées dans $user, le code OK 200, 
            //* et les données sélectionnés dans les entités via 'groups'
            return $this->json($user, 200, ['groups' => 'user:edit'], ['groups' => 'user:edit']);

          //*  si autre erreur que le validate (syntaxe par ex.) on retourne un message + code Bad Request 400
        } catch (NotEncodableValueException $exception) {
            return $this->json([
                'status' => 400,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Supprimer un user 
     * @Route("/api/user/{id<\d+>}", name="app_api_user_delete", methods={"DELETE"})
     */
    public function delete($id, EntityManagerInterface $entityManager)
    {
        //* on récupère notre repository User grâce à l'EntityManager, puis on récupère l'id du user grâce à find()
        $user = $entityManager->getRepository(User::class)->find($id);

        //* si l'utilisateur n'existe pas on renvoie une erreur 404
        if(!$user) {
            return $this->json(['error' => true, 'message' => "L'utilisateur demandé n'existe pas"], 404, [], []);
        }
       
        //* on essaie 
        try {
            $entityManager->remove($user);
            $entityManager->flush();

            //* Retourne au format JSON les données nouvellement entrées dans $user, le code OK 200, 
            //* et les données sélectionnés dans les entités via 'groups'
            return $this->json([
                'message' => 'L\'utilisateur a bien été supprimé'
            ], 200);

          //* si erreur dans le try on retourne un message + code Internal Server Error 500
        } catch (NotEncodableValueException $message) {
            return $this->json([
                'status' => 500,
                'message' => $message->getMessage()
            ], 500);
        }
    }
}

