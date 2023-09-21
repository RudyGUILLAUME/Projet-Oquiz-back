<?php

namespace App\Controller\Api;

use App\Entity\Quiz;
use App\Repository\QuizRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;

class ApiQuizController extends AbstractController
{
    /**
     * Récupère la liste de tous les quiz
     * @Route("/api/quiz", name="app_api_quiz_list", methods={"GET"})
     */
    public function list(QuizRepository $quizRepository): Response
    {
        //* On récupère nos données grâce au findAll dans notre $quizRepository 
        //* Qu'on sérialise grâce à la fonction json du AbstractController 
        //* On retourne un code 200 
        //* On récupère uniquement les données du groupe quiz:read
        return $this->json($quizRepository->findAll(), 200, ['groups' => 'quiz:read'], ['groups' => 'quiz:read']);
    }

    /**
     * Récupère un quiz via son id 
     * @Route("/api/quiz/{slug}", name="app_api_quiz_get_item", methods={"GET"})
     */
    public function find(Quiz $quiz = null): Response
    {
        //* Si le quiz = null alors le film (l'id) n'existe pas, on retourne donc une erreur 404 avec message
        if ($quiz === null) {
            return $this->json([
                'error' => true,
                'message' => "Le quiz demandé n'existe pas"
            ], 404, ['Erreur 404'], []);
        }
        //* Retourne au format JSON les données, le code OK 200, et les données sélectionnés dans les entités via 'groups'
        return $this->json($quiz, 200, ['groups' => 'quiz:read'], ['groups' => 'quiz:read']);
    }

    /**
     * Créer un quiz 
     * @Route("/api/quiz", name="app_api_quiz_create", methods={"POST"})
     */
    public function create(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {   
        //* on récupère le contenu de la requête HTTP grâce à Request
        $json = $request->getContent();

        //* on essaie 
        try {
            //* on désérialise les données envoyées en JSON vers le type attendu par notre BDD
            $quiz = $serializer->deserialize($json, Quiz::class, 'json');

            $quiz->setCreatedAt(new \DateTime());

            //* on vérifie bien que toutes les données nécessaires à la création seront bien présentes (NotBlank etc...)
            $errors = $validator->validate($quiz);

            //* s'il y a une erreur on retourne un code Bad Request 400
            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }

            //* si pas d'erreur on persist notre $quiz et on flush en BDD 
            $entityManager->persist($quiz);
            $entityManager->flush();

            //* Retourne au format JSON les données nouvellement entrées dans $quiz, le code Create 201, 
            //* et les données sélectionnés dans les entités via 'groups'
            return $this->json($quiz, 201, ['groups' => 'quiz:read'], ['groups' => 'quiz:read']);

          //*  si autre erreur que le validate (syntaxe par ex.) on retourne un message + code Bad Request 400
        } catch (NotEncodableValueException $message) {
            return $this->json([
                'status' => 400,
                'message' => $message->getMessage()
            ], 400);
        }
    }

    /**
     * Récupérer un quiz au hasard 
     * @Route("/api/random/quiz", name="app_api_quiz_random", methods={"GET"})
     */
    public function randomQuiz(QuizRepository $quizRepository): Response
    {
        //* On utilise la fonction getOneRandomQuiz du QuizRepository pour aller chercher un quiz au hasard
        $randomQuiz = $quizRepository->getOneRandomQuiz();

        return $this->json($randomQuiz, 200, ['groups' => 'quiz:read'], ['groups' => 'quiz:read']);
    }

    /**
     * Récupérer les quiz des créateurs du site
     * @Route("/api/perso/quiz", name="app_api_quiz_perso", methods={"GET"})
     */
    public function findPersonalQuiz(QuizRepository $quizRepository): Response
    {
    $personalQuiz = $quizRepository->getPersonalQuiz();

    return $this->json($personalQuiz, 200, ['groups' => 'quiz:read'], ['groups' => 'quiz:read']);
    }

}