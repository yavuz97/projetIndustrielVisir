<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Etablissement;
use App\Entity\Local;
use App\Form\EtablissementType;
use App\Form\LocalFormType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DefautController extends AbstractController
{
    /**
     * @Route("/", name="defaut_index")
     */
    public function index(Request $request, ObjectManager $manager)
    {
        //REPO ETABLISSEMENT
        $EtablissementRepo = $this->getDoctrine()->getRepository(Etablissement::class);
        $lesEtablissement = $EtablissementRepo->findAll();



        //ajout d'une nouvelle etablissement
        $etablissement = new Etablissement();
        $etablissementForm = $this->createForm(EtablissementType::class, $etablissement);
        $etablissementForm->handleRequest($request);


        // formulaire ajout etablissement
        if ($etablissementForm->isSubmitted() && $etablissementForm->isValid()) {

            $manager->persist($etablissement);
            $manager->flush();
        }


        return $this->render('defaut/index.html.twig', [
            'etablissementForm' => $etablissementForm->createView(),
            'etablissement' => $etablissement, // envoi à la vue les etablissement
            'lesEtablissement' => $lesEtablissement, // envoi à la vue les les etablissements

        ]);

    }

    /**
     * @Route("/profile", name="profile_user")
     */
    public function profile()
    {
        return $this->render('defaut/profile.html.twig', [
            'controller_name' => 'DefautController',
        ]);
    }


}
