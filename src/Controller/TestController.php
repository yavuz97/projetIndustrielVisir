<?php

namespace App\Controller;

use App\Entity\Local;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Eleve;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class TestController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }



    /**
     * @Route("/thead", name="thead")
     */
    public function thead()
    {
        return $this->render('test/thead.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    public function searchBar()
    {
        $form = $this->createFormBuilder(null)
            ->setAction($this->generateUrl('handle_search'))
            ->add("query", TextType::class, [
                'attr' => [
                    'placeholder'   => 'Enter search query...'
                ]
            ])
            ->add("submit", SubmitType::class)
            ->getForm()
        ;

        return $this->render('test/search.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/handleSearch/{_query?}", name="handle_search", methods={"POST", "GET"})
     */
    public function handleSearchRequest(Request $request, $_query)
    {
        $em = $this->getDoctrine()->getManager();

        if ($_query)
        {
            $data = $em->getRepository(Local::class)->findByName($_query);
        } else {
            $data = $em->getRepository(Local::class)->findAll();
        }
        dump($data);



        // setting up the serializer
        $normalizers = [
            new ObjectNormalizer()
        ];

        dump($normalizers);

        $encoders =  [
            new JsonEncoder()
        ];

        $serializer = new Serializer($normalizers, $encoders);

        $data = $serializer->serialize($data, 'json');

        return new JsonResponse($data, 200, [], true);
    }


    /**
     * @Route("/city/{id?}", name="city_page", methods={"GET"})
     */
    public function citySingle(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $eleve = null;

        if ($id) {
            $local = $em->getRepository(Local::class)->findOneBy(['id' => $id]);
        }

        return $this->render('test/city.html.twig', [
            'local'  =>      $local
        ]);
    }

}
