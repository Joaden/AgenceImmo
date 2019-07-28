<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class UserAccountController extends AbstractController
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    // Je récupère les données du user connecté
    public function __construct(UserRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/email", name="email")
     * @return Response
     */
    public function email(): Response
    {
        //Affiche les mails des Users
        $emails = $this->repository->find(13);
        dump($emails);
        return $this->render('users/email.html.twig', [
            'emails' => $emails
        ]);
    }


    /**
     * @Route("/account", name="account")
     * @return Response
     */
    public function account()
    {
        $users = $this->repository->find(13);
        dump($users);
        return $this->render('/account.html.twig', [
            'users' => $users
        ]);
    }


}