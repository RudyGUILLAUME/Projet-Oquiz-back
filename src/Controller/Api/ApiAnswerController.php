<?php

namespace App\Controller\Api;

use App\Entity\Answer;
use App\Repository\AnswerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiAnswerController extends AbstractController
{
    /**
     * Récupère la liste de toutes les réponses
     * @Route("/api/answer", name="app_api_answer_list", methods={"GET"})
     */
    public function list(AnswerRepository $answerRepository): Response
    {
        //* On récupère nos données grâce au findAll dans notre $AnswerRepository 
        //* Qu'on sérialise grâce à la fonction json du AbstractController 
        //* On retourne un code 200 
        //* On récupère uniquement les données du groupe answer:read
        return $this->json($answerRepository->findAll(), 200, ['groups' => 'answer:read'], ['groups' => 'answer:read']);
    }

    /**
     * Récupère une réponse via son id 
     * @Route("/api/answer/{id<\d+>}", name="app_api_answer_get_item", methods={"GET"})
     */
    public function find(Answer $answer = null): Response
    {
        //* Si la answer = null alors la catégorie (l'id) n'existe pas, on retourne donc une erreur 404 avec message
        if ($answer === null) {
            return $this->json([
                'error' => true,
                'message' => "La catégorie demandée n'existe pas"
            ], 404, [], []);
        }
        //* Retourne au format JSON les données, le code OK 200, et les données sélectionnés dans les entités via 'groups'
        return $this->json($answer, 200, ['groups' => 'answer:read'], ['groups' => 'answer:read']);
    }
}
