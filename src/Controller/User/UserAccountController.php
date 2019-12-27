<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Psr\Log\LoggerInterface;

use App\Entity\User;
use App\Entity\InfosUser;
use App\Form\RegistrationType;
use Twig\Environment;




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
    public function __construct(LoggerInterface $logger, UserRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
        $this->logger = $logger;
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

    // /**
    //  * @Route("/detail", name="user_detail")
    //  * @Method("GET")
    //  * @return Response
    //  */
    // public function userDetail(): Response
    // {
    //     //Affiche les details des Users
    //     $emails = $this->repository->findById();
    //     dump($emails);
    //     return $this->render('users/detail.html.twig', [
    //         'emails' => $emails
    //     ]);
    // }
    /**
     * @Route("user/{mail}", name="user_detail", options={"expose"=true})
     * @Method("GET")
     * @Template("users/user_detail.html.twig")
     */
    // public function userDetail($mail)
    // {
    //     $user = $this->repository->findById($mail);
    //     $user = $this->get('UsersManager')->getUsersByMail($mail);

    //     if (!$user) {
    //         //redirect error page
    //         return $this->render('/Error/error.html.twig', array(
    //             'title' => $this->get('translator')->trans('Erreur user'), 'message' => $this->get('ErrorMessage.service')->errorUser()));
    //     }
    // }



    /**
     * @Route("/account", name="account", requirements={"slug": "[a-z0-9\-]*"})
     * @param UserRepository $UserRepository
     * @return Response
     */
    public function account(UserRepository $repository)
    {
        $users = $this->repository->find(13);
        dump($users);
        return $this->render('/account.html.twig', [
            'users' => $users
        ]);
        // partie test 28/10/19
        // if ($user->getSlug() !==$slug) {
        //     // redirection vers une route
        //     // Appel du slug
        //     return $this->redirectToRoute('account.html.twig', [
        //         'id' => $user->getId(),
        //         'slug' => $user->getSlug()
        //     ], 301);
        //     // retourne la page show avec le menu properties
        // return $this->render('/account.html.twig', [
        //     'users' => $users
        // ]);
    }


}