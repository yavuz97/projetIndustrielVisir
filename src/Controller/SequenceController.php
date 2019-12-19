<?php

namespace App\Controller;

use App\Entity\Activite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sequence;
use App\Entity\Personnel;




use Symfony\Component\Validator\Constraints as Assert;
use App\Form\PersonnelType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;









class SequenceController extends AbstractController
{
    /**
     * @Route("/sequence", name="sequence")
     */
    public function index()
    {
        //REPO SEQUENCE
        $sequenceRepo = $this->getDoctrine()->getRepository(Sequence::class);
        $lesSequences = $sequenceRepo->findAll();

        //REPO PERONNEL ACTIVITE
        $ActiviteRepo = $this->getDoctrine()->getRepository(Activite::class);
        $lesActivites = $ActiviteRepo->findAll();

        //REPO PERONNEL PERSONNEL
        $personnelRepo = $this->getDoctrine()->getRepository(Personnel::class);
        $lesPersonnels = $personnelRepo->findAll();




        return $this->render('sequence/index.html.twig', [
            'lesSequences' => $lesSequences, // envoi à la vue les les personnels
            'lesActivites' => $lesActivites,
            'lesPersonnels' => $lesPersonnels,
        ]);
    }


    /**
     * @Route("/sequence/ajout", name="sequenceAjout")
     */
    public function sequanceAjout( Request $request, ObjectManager $manager)
    {




        $sequence = new Sequence();


        // formulaire ajout personnel
        if ($request->get('sequence')['valid'] == 'OK') {


            $activite = $request->get('sequence')['activite'];

            $activiteChoisit =  $activite[0];


            $idActivite = (int)filter_var($activiteChoisit, FILTER_SANITIZE_NUMBER_INT); // extraction de id ( partie integer ) de variable activite

            $repoActivite = $this->getDoctrine()->getRepository(Activite::class);
            $activite = $repoActivite->find($idActivite);



            $sequence->setActivite($activite);

            $personnel = $request->get('sequence')['personnel'];

            $personnelChoisit = $personnel[0];

            $idPersonnel = (int)filter_var($personnelChoisit, FILTER_SANITIZE_NUMBER_INT); // extraction de id ( partie integer ) de variable activite

            $repoPersonnel = $this->getDoctrine()->getRepository(Personnel::class);
            $personnel = $repoPersonnel->find($idPersonnel);

            $sequence->setPersonnel($personnel);

            $salle = $request->get('sequence')['salle'];
            $sequence->setSalle($salle);


            $heureDebut = $request->get('sequence')['heureDebut'];
            $heureDebut = new\DateTime($heureDebut);
            $sequence->setHeureDebut($heureDebut);


            $heureFin = $request->get('sequence')['heureFin'];
            $heureFin = new\DateTime($heureFin);
            $sequence->setHeureFin($heureFin);


            $date = $request->get('sequence')['date'];
            $date = new\DateTime($date);
            $sequence->setDate($date);



            $manager->persist($sequence);
            $manager->flush();
            return $this->redirectToRoute('sequence');
        }

        return $this->render('sequence/index.html.twig', [

        ]);
    }




    /**
     * @Route("/sequence/modifer/{id}", name="sequenceModify")
     */
    public function sequanceModfiy( $id, Request $request, ObjectManager $manager)
    {



        //REPO SEQUENCE
        $sequenceRepo = $this->getDoctrine()->getRepository(Sequence::class);
        $sequence = $sequenceRepo->find($id);




        // formulaire ajout personnel
        if ($request->get('sequence')['valid'] == 'OK') {


            $activite = $request->get('sequence')['activite'];

            $activiteChoisit =  $activite[0];


            $idActivite = (int)filter_var($activiteChoisit, FILTER_SANITIZE_NUMBER_INT); // extraction de id ( partie integer ) de variable activite

            $repoActivite = $this->getDoctrine()->getRepository(Activite::class);
            $activite = $repoActivite->find($idActivite);



            $sequence->setActivite($activite);

            $personnel = $request->get('sequence')['personnel'];

            $personnelChoisit = $personnel[0];

            $idPersonnel = (int)filter_var($personnelChoisit, FILTER_SANITIZE_NUMBER_INT); // extraction de id ( partie integer ) de variable activite

            $repoPersonnel = $this->getDoctrine()->getRepository(Personnel::class);
            $personnel = $repoPersonnel->find($idPersonnel);

            $sequence->setPersonnel($personnel);

            $salle = $request->get('sequence')['salle'];
            $sequence->setSalle($salle);


            $heureDebut = $request->get('sequence')['heureDebut'];
            dump($heureDebut);
            if($heureDebut <> null ){
                $heureDebut = new\DateTime($heureDebut);
                $sequence->setHeureDebut($heureDebut);
            }



            $heureFin = $request->get('sequence')['heureFin'];
            if($heureFin <> null ){
                $heureFin = new\DateTime($heureFin);
                $sequence->setHeureFin($heureFin);
            }



            $date = $request->get('sequence')['date'];
            if($date <> null ){
                $date = new\DateTime($date);
                $sequence->setDate($date);
            }
            $manager->flush();
            return $this->redirectToRoute('sequence');
        }

        return $this->render('sequence/index.html.twig', [

        ]);
    }



    // ======= supprimer un sequence =======
    /**
     * @Route("/sequence/delete/{id}", name="deleteSequence")
     */
    public function deleteSequence($id, ObjectManager $manager)
    {

        //REPO SEQUENCE
        $sequenceRepo = $this->getDoctrine()->getRepository(Sequence::class);
        $sequence = $sequenceRepo->find($id);

        $manager->remove($sequence);
        $manager->flush();

        return $this->redirectToRoute('sequence');
    }



}
