<?php

namespace App\Controller\Api;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ApiCategoryController extends AbstractController
{
    protected $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
    
    /**
     * Récupère la liste de toutes les categories
     * @Route("/api/category", name="app_api_category_list", methods={"GET"})
     */
    public function list(CategoryRepository $CategoryRepository): Response
    {
        //* On récupère nos données grâce au findAll dans notre $CategoryRepository 
        //* Qu'on sérialise grâce à la fonction json du AbstractController 
        //* On retourne un code 200 
        //* On récupère uniquement les données du groupe category:read
        return $this->json($CategoryRepository->findAll(), 200, ['groups' => 'category:read'], ['groups' => 'category:read']);
    }

    /**
     * Récupère une catégorie via son id 
     * @Route("/api/category/{slug}", name="app_api_category_get_item", methods={"GET"})
     */
    public function find(Category $category = null): Response
    {
        //* Si la category = null alors la catégorie (l'id) n'existe pas, on retourne donc une erreur 404 avec message
        if ($category === null) {
            return $this->json([
                'error' => true,
                'message' => "La catégorie demandée n'existe pas"
            ], 404, [], []);
        }
        //* Retourne au format JSON les données, le code OK 200, et les données sélectionnés dans les entités via 'groups'
        return $this->json($category, 200, ['groups' => 'category:read'], ['groups' => 'category:read']);
    }
}