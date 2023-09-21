<?php

namespace App\Controller\Api;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiQuestionController extends AbstractController
{
    /**
     * Récupère la liste de toutes les questions
     * @Route("/api/question", name="app_api_question_list", methods={"GET"})
     */
    public function list(QuestionRepository $questionRepository): Response
    {
        //* On récupère nos données grâce au findAll dans notre $questionRepository 
        //* Qu'on sérialise grâce à la fonction json du AbstractController 
        //* On retourne un code 200 
        //* On récupère uniquement les données du groupe question:read
        return $this->json($questionRepository->findAll(), 200, ['groups' => 'question:read'], ['groups' => 'question:read']);
    }

    /**
     * Récupère une question via son id 
     * @Route("/api/question/{id<\d+>}", name="app_api_question_get_item", methods={"GET"})
     */
    public function find(Question $question = null): Response
    {
        //* Si $question = null alors la question (l'id) n'existe pas, on retourne donc une erreur 404 avec message
        if ($question === null) {
            return $this->json([
                'error' => true,
                'message' => "La question demandée n'existe pas"
            ], 404, ['Erreur 404'], []);
        }
        //* Retourne au format JSON les données, le code OK 200, et les données sélectionnés dans les entités via 'groups'
        return $this->json($question, 200, ['groups' => 'question:read'], ['groups' => 'question:read']);
    }
}
