<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Activite;
use App\Form\LocalFormType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

class ActiviteController extends AbstractController
{
    /**
     * @Route("/activites", name="les_activites")
     */
    public function index(Request $request, ObjectManager $manager)
    {

        //REPO LOCAL
        $activiteRepo = $this->getDoctrine()->getRepository(Activite::class);
        $lesActivites = $activiteRepo->findAll();


        //ajout d'une nouvelle activite
        $activite = new Activite();

        // formulaire ajout etablissement
        if ($request->get('activite')['valid'] == 'OK') {

            $nom = $request->get('activite')['nom'];
            $activite->setNom($nom);

            $codeStatistique = $request->get('activite')['codeStatistique'];

            $activite->setCodeStatistique($codeStatistique);


            $codeRegroupement = $request->get('activite')['codeRegroupement'];
            $activite->setCodeRegroupement($codeRegroupement);
            $manager->persist($activite);
            $manager->flush();
            return $this->redirectToRoute('les_activites');
        }


        return $this->render('activite/activites.html.twig', [


            'activite' => $activite, // envoi à la vue les les activites
            'lesActivites' => $lesActivites, // envoi à la vue les les activites


        ]);

    }



    // ======= modifier un objet user =============
    /**
     * @Route("/activite/edit/{id}", name="activites_edit_activite")
     */
    public function editLocal($id, Request $request, ObjectManager $manager)
    {

        $activiteRepo = $this->getDoctrine()->getRepository(Activite::class);
        $activite = $activiteRepo->find($id);




        if ($request->get('activite')['valid'] == 'OK') {

            $nom = $request->get('activite')['nom'];
            $activite->setNom($nom);

            $codeStatistique = $request->get('activite')['codeStatistique'];

            $activite->setCodeStatistique($codeStatistique);


            $codeRegroupement = $request->get('activite')['codeRegroupement'];
            $activite->setCodeRegroupement($codeRegroupement);


            $manager->flush();
            return $this->redirectToRoute('les_activites');
        }
        return $this->render('activite/activites.html.twig', [


            'activite' => $activite, // envoi à la vue les les activites

        ]);
    }


    // ======= supprimer un activite =======
    /**
     * @Route("/activite/delete/{id}", name="activites_delete_activite")
     */
    public function deletelocal($id, ObjectManager $manager)
    {
        $activiteRepo = $this->getDoctrine()->getRepository(Activite::class);
        $activite = $activiteRepo->find($id);
        $manager->remove($activite);
        $manager->flush();

        return $this->redirectToRoute('les_activites');
    }



}
