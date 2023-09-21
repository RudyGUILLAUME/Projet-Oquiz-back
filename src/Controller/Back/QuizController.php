<?php

namespace App\Controller\Back;

use App\Entity\Quiz;
use App\Form\QuizType;
use App\Form\SearchType;
use App\Model\SearchData;
use App\Repository\QuizRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/quiz")
 */
class QuizController extends AbstractController
{
    /**
     * @Route("/", name="app_back_quiz_index", methods={"GET"})
     */
    public function index(Request $request, QuizRepository $quizRepository, PaginatorInterface $paginator): Response
    {        
        // Création d'un objet SearchData pour stocker les critères de recherche.
        $searchData = new SearchData();

        // Création d'un formulaire en utilisant la classe SearchType et en associant l'objet $searchData au formulaire.
        $form = $this->createForm(SearchType::class, $searchData);

        // Traitement de la soumission du formulaire et validation des données.
        $form->handleRequest($request);

        // Si le formulaire a été soumis et que les données sont valides.
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupération du numéro de page à partir de la requête. S'il n'est pas défini, le numéro de page par défaut est 1.
            $searchData->page = $request->query->getInt('page', 1);

            // Appel de la fonction findBySearch() de l'objet $answerRepository
            $quizzes = $quizRepository->findBySearch($searchData, $paginator);

            // Rendu de la vue 'back/answer/index.html.twig' en passant les données nécessaires à la vue.
            return $this->render('back/quiz/index.html.twig', [
                'form' => $form->createView(),
                'quizzes' => $quizzes,

            ]);
        }
        return $this->render('back/quiz/index.html.twig', [
            'form' => $form->createView(),
            'quizzes' => $quizRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_quiz_new", methods={"GET", "POST"})
     */
    public function new(Request $request, QuizRepository $quizRepository): Response
    {
        $quiz = new Quiz();
        $form = $this->createForm(QuizType::class, $quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quiz->setCreatedAt(new \DateTime());
            $quizRepository->add($quiz, true);

            return $this->redirectToRoute('app_back_quiz_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/quiz/new.html.twig', [
            'quiz' => $quiz,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_quiz_show", methods={"GET"})
     */
    public function show(Quiz $quiz): Response
    {
        return $this->render('back/quiz/show.html.twig', [
            'quiz' => $quiz,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_quiz_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Quiz $quiz, QuizRepository $quizRepository): Response
    {
        $form = $this->createForm(QuizType::class, $quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quiz->setUpdatedAt(new \DateTime());

            $quizRepository->add($quiz, true);

            return $this->redirectToRoute('app_back_quiz_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/quiz/edit.html.twig', [
            'quiz' => $quiz,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_quiz_delete", methods={"POST"})
     */
    public function delete(Request $request, Quiz $quiz, QuizRepository $quizRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quiz->getId(), $request->request->get('_token'))) {
            $quizRepository->remove($quiz, true);
        }

        return $this->redirectToRoute('app_back_quiz_index', [], Response::HTTP_SEE_OTHER);
    }
}
