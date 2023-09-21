<?php

namespace App\Controller\Back;


use App\Entity\Question;
use App\Form\QuestionType;
use App\Form\SearchType;
use App\Model\SearchData;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/back/question")
 */
class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_back_question_index", methods={"GET"})
     */
    public function index(Request $request, QuestionRepository $questionRepository, PaginatorInterface $paginator): Response
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
            $questions = $questionRepository->findBySearch($searchData, $paginator);

            // Rendu de la vue 'back/answer/index.html.twig' en passant les données nécessaires à la vue.
            return $this->render('back/question/index.html.twig', [
                'form' => $form->createView(),
                'questions' => $questions,
        ]);
 
        } 
        $data = $questionRepository->findBy([], ['id' => 'asc']);
        
        $questions = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            15
        );

        return $this->render('back/question/index.html.twig', [
            'form' => $form->createView(),
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/new", name="app_back_question_new", methods={"GET", "POST"})
     */
    public function new(Request $request, QuestionRepository $questionRepository): Response
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $question->setCreatedAt(new \DateTime());

            $questionRepository->add($question, true);

            return $this->redirectToRoute('app_back_question_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/question/new.html.twig', [
            'form' => $form,
            'question' => $question,
            
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_question_show", methods={"GET"})
     */
    public function show(Question $question): Response
    {
        return $this->render('back/question/show.html.twig', [
            'question' => $question,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_question_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Question $question, QuestionRepository $questionRepository): Response
    {
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $question->setUpdatedAt(new \DateTime());

            $questionRepository->add($question, true);

            return $this->redirectToRoute('app_back_question_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/question/edit.html.twig', [
            'question' => $question,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_question_delete", methods={"POST"})
     */
    public function delete(Request $request, Question $question, QuestionRepository $questionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$question->getId(), $request->request->get('_token'))) {
            $questionRepository->remove($question, true);
        }

        return $this->redirectToRoute('app_back_question_index', [], Response::HTTP_SEE_OTHER);
    }
}
