<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\UserRepository;
use App\Entity\User;
use App\Form\RegistrationType;
use App\Form\ContactType;

use Doctrine\Common\Persistence\ObjectManager;

class AdminUserController extends AbstractController
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    // j'ai besoin de recuperer donc j insjecte repository
    public function __construct(UserRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/admin/user", name="admin_user.index")
     * @return \Symfony\Component\HttpFoundatin\Response
     */
    public function index()
    {
        // Je récupère tous les Users
        $users = $this->repository->findAll();
        // je les affiche sur la page admin_user_index 
        return $this->render('admin_user/index.html.twig', compact('users'));
    }

    /**
     * @Route("/admin/user/create", name="admin_user.new")
     */
    public function new(Request $request)
        {
            //création d'un nouvel utilisateur
            $user = new User();
            $form = $this->createForm(RegistrationType::class, $user);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) 
                {
                    $this->em->persist($user);
                    $this->em->flush();
                    $this->addFlash('success','Le user a bien été créé avec succès');
                    return $this->redirectToRoute('admin_user.index');
                }
                return $this->render('admin_user/new.html.twig', [
                    'property' => $user,
                    'form' => $form->createView()
                ]);
        }

        /**
         * @Route("/admin/user/{id}", name="admin_user.edit", methods="GET|POST")
         * @param User $user
         * @param Request $request
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function edit(User $user, Request $request)
        {
            // on passe en injection les objets
        $form = $this->createForm(RegistrationType::class, $user);
        //on gere la requete
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) 
        {
            // Si le form et valide et sublit on utilise entityManager
            $this->em->flush();
            $this->addFlash('success', 'Le user a été modifié avec succès');
            return $this->redirectToRoute('admin_user.index');
        }
        // retourne la page d'édition
        //return $this->render('admin/user/edit.html.twig', compact('user'));

        return $this->render('admin_user/edit.html.twig', [
            'user' => $user,
            // Méthode createView() envoi un objet de type vue qui est renvoyé
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/user/{id}", name="admin_user.delete", methods="DELETE")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
        public function delete(User $user, Request $request)
        {
            // Validation du token csrf pour la securite
            // delede suivi de l id et 
            // on lui donne lid du token suvi du property getId
            // 
            if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->get("_token")))
            {   
                $this->em->remove($user);
                $this->em->flush();
                $this->addFlash('success', 'Le user a été supprimé avec succès');

                //return new Response('Suppression');
            }
            return $this->redirectToRoute('admin_user.index');
        }


}