<?php

namespace App\Controller\Back;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Form\SearchType as FormSearchType;
use App\Model\SearchData;
use App\Repository\CategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/category")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="app_back_category_index", methods={"GET"})
     */
    public function index(Request $request, CategoryRepository $categoryRepository, PaginatorInterface $paginator): Response
    {
        // Création d'un objet SearchData pour stocker les critères de recherche.
        $searchData = new SearchData();

        // Création d'un formulaire en utilisant la classe SearchType et en associant l'objet $searchData au formulaire.
        $form = $this->createForm(FormSearchType::class, $searchData);

        // Traitement de la soumission du formulaire et validation des données.
        $form->handleRequest($request);

        // Si le formulaire a été soumis et que les données sont valides.
        if ($form->isSubmitted() && $form->isValid()) {

            // Récupération du numéro de page à partir de la requête. S'il n'est pas défini, le numéro de page par défaut est 1.
            $searchData->page = $request->query->getInt('page', 1);

            // Appel de la fonction findBySearch() de l'objet $answerRepository
            $categories = $categoryRepository->findBySearch($searchData, $paginator);

            // Rendu de la vue 'back/answer/index.html.twig' en passant les données nécessaires à la vue.
            return $this->render('back/category/index.html.twig', [
                'form' => $form->createView(),
                'categories' => $categories,
                
            ]); 
        } 
        
        return $this->render('back/category/index.html.twig', [
            'form' => $form->createView(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_category_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CategoryRepository $categoryRepository): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category->setCreatedAt(new \DateTime());

            $categoryRepository->add($category, true);

            return $this->redirectToRoute('app_back_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/category/new.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_category_show", methods={"GET"})
     */
    public function show(Category $category): Response
    {
        return $this->render('back/category/show.html.twig', [
            'category' => $category,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_category_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Category $category, CategoryRepository $categoryRepository): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category->setUpdatedAt(new \DateTime());

            $categoryRepository->add($category, true);

            return $this->redirectToRoute('app_back_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/category/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_category_delete", methods={"POST"})
     */
    public function delete(Request $request, Category $category, CategoryRepository $categoryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $categoryRepository->remove($category, true);
        }

        return $this->redirectToRoute('app_back_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
