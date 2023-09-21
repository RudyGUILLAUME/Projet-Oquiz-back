<?php

namespace App\Controller\Api;

use App\Entity\Quiz;
use App\Entity\User;
use App\Entity\Score;
use App\Repository\CategoryRepository;
use App\Repository\ScoreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiScoreController extends AbstractController
{
    /**
     * Récupère la liste de tous les scores
     * @Route("/api/score", name="app_api_score_list", methods={"GET"})
     */
    public function list(ScoreRepository $scoreRepository): Response
    {
        //* On récupère nos données grâce au findAll dans notre $scoreRepository
        //* Qu'on sérialise grâce à la fonction json du AbstractController
        //* On retourne un code 200
        //* On récupère uniquement les données du groupe score:read
        return $this->json($scoreRepository->findAll(), 200, ['groups' => 'score:read'], ['groups' => 'score:read']);
    }

    /**
     * Récupère un score via son id
     * @Route("/api/score/{id<\d+>}", name="app_api_score_get_item", methods={"GET"})
     */
    public function find(Score $score = null): Response
    {
        //* Si le score = null alors le score (l'id) n'existe pas, on retourne donc une erreur 404 avec message
        if ($score === null) {
            return $this->json(['error' => true, 'message' => "Le score demandé n'existe pas"], 404, [], []);
        }
        //* Retourne au format JSON les données, le code OK 200, et les données sélectionnés dans les entités via 'groups'
        return $this->json($score, 200, ['groups' => 'score:read'], ['groups' => 'score:read']);
    }

    /**
     * Modifier le score d'un utilisateur
     * @Route("/api/score", name="app_api_user_edit_score", methods={"PATCH"})
     */
    public function editScore(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupére le contenu de la requête HTTP grâce à Request
        $json = $request->getContent();

        // https://www.php.net/manual/en/function.json-decode.php
        // On récupère nos données du $json en tableau associatif
        $jsonData = json_decode($json, true);

        // Récupère les valeurs de score, quiz_id et user_id du JSON désérialisé
        $score = $jsonData['score'];
        $quizId = $jsonData['quiz_id'];
        $userId = $jsonData['user_id'];

        // Recherche le quiz correspondant à l'ID du quiz dans la base de données
        $quiz = $entityManager->getRepository(Quiz::class)->find($quizId);

        // Recherche l'utilisateur correspondant à l'ID de l'utilisateur dans la base de données
        $user = $entityManager->getRepository(User::class)->find($userId);

        // Vérifie si le quiz existe
        if (!$quiz) {
            return $this->json(['error' => true, 'message' => "Le quiz demandé n'existe pas"], 404, [], []);
        }
        // Vérifie si l'utilisateur existe
        if (!$user) {
            return $this->json(['error' => true, 'message' => "L'utilisateur demandé n'existe pas"], 404, [], []);
        }

        // Vérifie si l'utilisateur a déjà un score enregistré
        $existingScore = $entityManager->getRepository(Score::class)->findOneBy(['user' => $user, 'quiz' => $quiz]);

        if ($existingScore) {
            // Si un score existe déjà pour cet utilisateur, vérifie s'il est inférieur au nouveau score
            if ($score > $existingScore->getScore()) {
                // Mettre à jour le score existant avec le nouveau score
                $existingScore->setScore($score);
                $entityManager->flush();

                return $this->json(['success' => true, 'message' => "Score modifié avec succès"], 200, [], []);
            } else {
                return $this->json(['success' => true, 'message' => "Votre score est égal ou plus élevé"], 200, [], []);
            }
        }
        // Si aucun score n'existe pour cet utilisateur, création d'un nouveau 
        $scoreObject = new Score();
        $scoreObject->setScore($score);
        $scoreObject->setQuiz($quiz);
        $scoreObject->setUser($user);

        // Enregistre le score dans la base de données
        $entityManager->persist($scoreObject);
        $entityManager->flush();

        return $this->json(['success' => true, 'message' => "Nouveau score ajouté avec succès"], 200, [], []);
    }

    /**
     * Récupère le score total d'un utilisateur (par score total)
     * @Route("/api/score/user/{id<\d+>}", name="user_total_score", methods={"GET"})
     */
    public function userTotalScore(ScoreRepository $scoreRepository, $id = null): Response
    {
        //* Si le score = null alors le score (l'id) n'existe pas, on retourne donc une erreur 404 avec message
        if ($id === null) {
            return $this->json(['error' => true, 'message' => "Le score demandé n'existe pas"], 404, [], []);
        }
        // on appelle la fonction allUsersTotalScore de notre ScoreRepository 
        $ranking = $scoreRepository->getUserTotalScore($id);

        return $this->json($ranking, 200);
    }

    /**
     * Récupère le classement des 10 meilleurs utilisateurs 
     * @Route("/api/score/top10", name="top10_total_scores", methods={"GET"})
     */
    public function top10Ranking(ScoreRepository $scoreRepository): Response
    {
        // on appelle la fonction allUsersTotalScore de notre ScoreRepository 
        $ranking = $scoreRepository->getTop10UsersTotalScore();

        return $this->json($ranking, 200);
    }

    /**
     * Récupère le classement des users par catégorie 
     * @Route("/api/score/category", name="category_total_scores", methods={"GET"})
     */
    public function topCategoryScore(CategoryRepository $categoryRepository): Response
    {
        // on appelle la fonction allUsersTotalScore de notre ScoreRepository 
        $ranking = $categoryRepository->getCategoryTotalScore();

        return $this->json($ranking, 200);
    }
}