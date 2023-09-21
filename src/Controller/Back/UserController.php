<?php

namespace App\Controller\Back;

use App\Entity\User;
use App\Form\SearchType;
use App\Form\UserType;
use App\Model\SearchData;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="app_back_user_index", methods={"GET"})
     */
    public function index(Request $request, UserRepository $userRepository, PaginatorInterface $paginator): Response
    {

        $searchData = new SearchData();
        $form = $this->createForm(SearchType::class, $searchData);

        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           $searchData->page = $request->query->getInt('page', 1);
           $users = $userRepository->findBySearch($searchData, $paginator);
        
           return $this->render('back/user/index.html.twig', [
                'form' => $form->createView(),
                'users' => $users,
                
           ]);
        } 
        return $this->render('back/user/index.html.twig', [
            'form' => $form->createView(),
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_user_new", methods={"GET", "POST"})
     */
    public function new(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userPassword = $form->get('password')->getData();
            $hashedPassword = $passwordHasher->hashPassword($user, $userPassword);
            $user->setPassword($hashedPassword);
            $user->setCreatedAt(new \DateTime());

            $userRepository->add($user, true);

            return $this->redirectToRoute('app_back_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('back/user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, User $user, UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $userPassword = $user->getPassword();
        $hashedPassword = $passwordHasher->hashPassword($user, $userPassword);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($hashedPassword);
            $user->setUpdatedAt(new \DateTime());

            $userRepository->add($user, true);

            return $this->redirectToRoute('app_back_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_back_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
