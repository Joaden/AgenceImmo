<?php
namespace App\Controller\Admin;

//use PhpParser\Builder\Property;
use App\Repository\PropertyRepository;
use App\Form\PropertyType;
use App\Entity\Property;
use App\Entity\Option;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Csrf\CsrfTokenManager;

use Doctrine\Common\Persistence\ObjectManager;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class AdminPropertyController extends AbstractController
{

    /**
     * @var PropertyRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    // j'ai besoin de recuperer donc j insjecte repository
    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin/property", name="admin.property.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        //     * @Template("@admin/property/index.html.twig")

        // findAll pour tout recuperer car l'admin doit pouvoir voir tout
//        $properties = $this->repository->findAll();
        $properties = $this->repository->findBy(array(), array('id' => 'DESC'));
//        dump($properties);
//        die;
        // renvois vers la page index avec un tableau compact
//        return $this->findBy(array(), array('id' => 'ASC'));
        return $this->render('admin/property/index.html.twig', compact('properties'));
    }

    /**
     * @Route("/admin/property/create", name="admin.property.new")
     */
    public function new(Request $request)
    {
        // création manuelle, create form,
        $property = new Property();

        $form = $this->createForm(PropertyType::class, $property);

        $form->handleRequest($request);

//        $files = $request->files->get('post')['my_files'];
//        dump($files);
//        foreach($file as $files)
//            {
//                $filename = md5(uniqid()) . '.' . $file->guessExtension();
//                $file->move($uploads_directory,
//                            $filename);
//            }

//

        if($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($property);
            dump($property);
//            die;
            $this->em->flush();
            $this->addFlash('success', 'Le bien a été créé avec succès');
            return $this->redirectToRoute('admin.property.index');
        }
        return $this->render('admin/property/new.html.twig', [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.edit", methods="GET|POST")
     * @param Property $property
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Property $property, Request $request)
    {   
        // Ajout d'option lors de la création
        //$option = new Option();
        //$property->addOption($option);

        // on passe en injection les objets
        $form = $this->createForm(PropertyType::class, $property);
        //on gere la requete
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) 
        {
            // 
            $this->em->flush();
            $this->addFlash('success', 'Le bien a été modifié avec succès');
            return $this->redirectToRoute('admin.property.index');
        }
        // retourne la page d'édition
        //return $this->render('admin/property/edit.html.twig', compact('property'));

        return $this->render('admin/property/edit.html.twig', [
            'property' => $property,
            // Méthode createView() envoi un objet de type vue qui est renvoyé
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.delete", methods="DELETE")
     * @param Property $property
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Property $property, Request $request)
    {
        // Validation du token csrf pour la securite
        // delede suivi de l id et 
        // on lui donne lid du token suvi du property getId
        // 
        if ($this->isCsrfTokenValid('delete' . $property->getId(), $request->get("_token")))
        {   
            $this->em->remove($property);
            $this->em->flush();
            $this->addFlash('success', 'Le bien a été supprimé avec succès');

            //return new Response('Suppression');
        }
        return $this->redirectToRoute('admin.property.index');
    }
}