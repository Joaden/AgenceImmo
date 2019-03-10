<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 10/02/2019
 * Time: 04:56
 */

namespace App\Controller;


use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class HomeController extends AbstractController
{
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /*public function index(): Response
    {
        return new Response($this->render('pages/home.html.twig'));
    }*/


    /**
     * @Route("/", name="home")
     * @param PropertyRepository $repository
     * @return Response
     */
    public function index(PropertyRepository $repository): Response
    {
        //on a injecté le propertyrepo dans le index
        $properties = $repository->findLatest();
        return $this->render('pages/home.html.twig', [
            'properties' => $properties
        ]);
      return new Response('coucou');
    }

}