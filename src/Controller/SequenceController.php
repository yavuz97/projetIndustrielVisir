<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Eleve;
use App\Form\SuivieActiviteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sequence;
use App\Entity\Personnel;
use App\Entity\SuivieActivite;


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

        //REPO ELEVE
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $lesEleves = $eleveRepo->findAll();

        return $this->render('sequence/index.html.twig', [
            'lesSequences' => $lesSequences, // envoi à la vue les les personnels
            'lesActivites' => $lesActivites,
            'lesPersonnels' => $lesPersonnels,
            'lesEleves' => $lesEleves,
        ]);
    }


    /**
     * @Route("/lesSequences", name="lesSequences")
     */
    public function indexSequences(Request $request)
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

        //REPO ELEVE
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $lesEleves = $eleveRepo->findAll();


        $date1 = new\DateTime();
        $date2 = new\DateTime();

        if ($request->get('deuxDate')['valid'] == 'OK') {

            $dateUn = $request->get('deuxDate')['dateUn'];
            if ($dateUn != null){
                $date1 = new\DateTime($dateUn);
            }
            $dateUn = $request->get('deuxDate')['dateDeux'];
            if ($dateUn != null){
                $date2 = new\DateTime($dateUn);
            }

        }

        if ($request->get('dateAvenir')['valid'] == 'OK') {

                $date1 = new\DateTime(date("F j, Y", strtotime( '+1 days' ) ));
                $date2 = new\DateTime('2090-12-12');
        }

        if ($request->get('datePassee')['valid'] == 'OK') {

            $date1 = new\DateTime('1970-12-12');
            $date2 = new\DateTime(date("F j, Y", strtotime( '-1 days' ) ));
        }

        if ($request->get('dateTout')['valid'] == 'OK') {

            $date1 = new\DateTime('1970-12-12');
            $date2 = new\DateTime('2090-12-12');
        }

        return $this->render('sequence/lesSequences.html.twig', [
            'lesSequences' => $lesSequences, // envoi à la vue les les personnels
            'lesActivites' => $lesActivites,
            'lesPersonnels' => $lesPersonnels,
            'lesEleves' => $lesEleves,
            'date1' => $date1,
            'date2' => $date2,
        ]);
    }


    /**
     * @Route("/sequence/pdfDownload", name="pdfDownload")
     */
    public function pdfDownload()
    {
        $file ="yes" .".pdf";

// We will be outputting a PDF
        header('Content-Type: application/pdf');

// It will be called downloaded.pdf
        header('Content-Disposition: attachment; filename="gfgpdf.pdf"');


    }




    /**
     * @Route("/sequence/show/{id}", name="showSequence")
     */
    public function sequenceShow($id, Request $request, ObjectManager $manager)
    {


        //REPO SEQUENCE
        $sequenceRepo = $this->getDoctrine()->getRepository(Sequence::class);
        $sequence = $sequenceRepo->find($id);


        $sequenceRepo = $this->getDoctrine()->getRepository(Sequence::class);
        $lesSequences = $sequenceRepo->findAll();

        //REPO PERONNEL ACTIVITE
        $ActiviteRepo = $this->getDoctrine()->getRepository(Activite::class);
        $lesActivites = $ActiviteRepo->findAll();

        //REPO PERONNEL PERSONNEL
        $personnelRepo = $this->getDoctrine()->getRepository(Personnel::class);
        $lesPersonnels = $personnelRepo->findAll();

        //REPO ELEVE
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $lesEleves = $eleveRepo->findAll();


        // ===== partie renvoie les eleves qui ne sont pas attribué pour une suivie
        $lesSequencesSuivie = $sequence->getLesSuivieActitivites();

        $sequenceIDArray = array();
        foreach ($lesSequencesSuivie as $unsuivie) {
            $unEleveSuivie = $unsuivie->getEleve();
            $idUnSequence = $unEleveSuivie->getId();
            $sequenceIDArray[] = $idUnSequence;
        }
        $lesElevesIDarray = array();
        foreach ($lesEleves as $unEleve) {
            $lesElevesId = $unEleve->getId();
            $lesElevesIDarray[] = $lesElevesId;
        }
        $lesElevesAChoisir = array_diff($lesElevesIDarray, $sequenceIDArray);
        // fin ===== partie renvoie les eleves qui ne sont pas attribué pour une suivie




        if ($request->get('ajoutEleve')['valid'] == 'OK') {
            $yes = $request->get('ajoutEleve')['valid'];
            dump($yes);
            // specifications
            for ($x = 0; $x < count($request->get('ajoutEleve')['eleve']); $x++) {
                $suivie = new SuivieActivite();

                $eleve = $request->get('ajoutEleve')['eleve'][$x];

                $eleveChoisit = $eleve;
                $idEleve = (int)filter_var($eleveChoisit, FILTER_SANITIZE_NUMBER_INT); // extraction de id ( partie integer ) de variable activite
                //REPO ELEVE
                $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
                $eleve = $eleveRepo->find($idEleve);

                $suivie->setEleve($eleve);
                $suivie->setSequence($sequence);


                $travailAFaire = $request->get('ajoutEleve')['travailAFaire'][$x];
                $suivie->setTravailAfaire($travailAFaire);



                $travailAprevoir = $request->get('ajoutEleve')['travailAprevoir'][$x];
                $suivie->setTravailAprevoir($travailAprevoir);


                $manager->persist($suivie);
                $manager->flush();
            }

            return $this->redirectToRoute('showSequence', ['id' => $id]);
            }


























        return $this->render('sequence/showSequence.html.twig', [
            'sequence' => $sequence, // envoi à la vue les les personnels
            'lesActivites' => $lesActivites,
            'lesPersonnels' => $lesPersonnels,
            'lesEleves' => $lesEleves,
            'lesSequences' => $lesSequences,
            'lesElevesAChoisir' => $lesElevesAChoisir,
        ]);

    }







    /**
     * @Route("/sequence/sequanceAjoutEleve", name="sequanceAjoutEleve")
     */
    public function sequanceAjoutEleve(Request $request, ObjectManager $manager)
    {


        $sequence = new Sequence();


        // formulaire ajout personnel
        if ($request->get('sequence')['valid'] == 'OK') {


            $activite = $request->get('sequence')['activite'];

            $activiteChoisit = $activite[0];


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
     * @Route("/sequence/ajout", name="sequenceAjout")
     */
    public function sequanceAjout(Request $request, ObjectManager $manager)
    {


        $sequence = new Sequence();


        // formulaire ajout personnel
        if ($request->get('sequence')['valid'] == 'OK') {


            $activite = $request->get('sequence')['activite'];

            $activiteChoisit = $activite[0];


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
     * @Route("/sequence/ajoutEleve/{id}", name="sequenceAjoutEleve")
     */
    public function ajoutEleveSequence($id, Request $request, ObjectManager $manager)
    {

        //REPO SEQUENCE
        $sequenceRepo = $this->getDoctrine()->getRepository(Sequence::class);
        $sequence = $sequenceRepo->find($id);


        for ($x = 0; $x < count($request->get('ajoutEleve')['eleve']); $x++) {

            $suivie = new SuivieActivite();

            if ($request->get('ajoutEleve')['valid'] == 'OK') {

                $eleve = $request->get('ajoutEleve')['eleve'][$x];

                $eleveChoisit = $eleve[0];
                $idEleve = (int)filter_var($eleveChoisit, FILTER_SANITIZE_NUMBER_INT); // extraction de id ( partie integer ) de variable activite

                //REPO ELEVE
                $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
                $eleve = $eleveRepo->find($idEleve);

                $suivie->setEleve($eleve);
                $suivie->setSequence($sequence);


                $travailAFaire = $request->get('ajoutEleve')['travailAFaire'][$x];
                $suivie->setTravailAfaire($travailAFaire);


                $travailAprevoir = $request->get('ajoutEleve')['travailAprevoir'][$x];
                $suivie->setTravailAprevoir($travailAprevoir);

                $manager->persist($suivie);
                $manager->flush();
            }
        }


        return $this->redirectToRoute('sequence');

    }


    /**
     * @Route("/sequence/modifer/{id}", name="sequenceModify")
     */
    public function sequanceModfiy($id, Request $request, ObjectManager $manager)
    {


        //REPO SEQUENCE
        $sequenceRepo = $this->getDoctrine()->getRepository(Sequence::class);
        $sequence = $sequenceRepo->find($id);


        // formulaire ajout personnel
        if ($request->get('sequence')['valid'] == 'OK') {


            $activite = $request->get('sequence')['activite'];

            $activiteChoisit = $activite[0];


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
            if ($heureDebut <> null) {
                $heureDebut = new\DateTime($heureDebut);
                $sequence->setHeureDebut($heureDebut);
            }


            $heureFin = $request->get('sequence')['heureFin'];
            if ($heureFin <> null) {
                $heureFin = new\DateTime($heureFin);
                $sequence->setHeureFin($heureFin);
            }


            $date = $request->get('sequence')['date'];
            if ($date <> null) {
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

        return $this->redirectToRoute('lesSequences');
    }



    // ======= supprimer un suivie =======

    /**
     * @Route("/sequenceSuivie/delete/{id}", name="deleteSequenceSuivie")
     */
    public function deleteSuivie($id, ObjectManager $manager)
    {
        dump($id);
        //REPO SEQUENCE
        $repoSuivie = $this->getDoctrine()->getRepository(SuivieActivite::class);
        $suivie = $repoSuivie->find($id);


        $manager->remove($suivie);
        $manager->flush();

        $suivieSequence = $suivie->getSequence();
        $idSequence = $suivieSequence->getId();
        return $this->redirectToRoute('showSequence', ['id' => $idSequence]);
    }



    // ======= faire une absence séquence =======

    /**
     * @Route("/sequence/absence/{id}", name="addAbsence")
     */
    public function absenceSequence($id, Request $request, ObjectManager $manager)
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

        //REPO ELEVE
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $lesEleves = $eleveRepo->findAll();

        //REPO SEQUENCE
        $sequenceRepo = $this->getDoctrine()->getRepository(Sequence::class);
        $sequence = $sequenceRepo->find($id);


        $sequenceSuivie = $sequence->getLesSuivieActitivites();
        if ($request->get('absence')['valid'] == 'OK') {
            for ($x = 0; $x < count($sequenceSuivie); $x++) {

                $suivie = $sequenceSuivie[$x];

                $absent = $request->get('absence')['absent'];

                $suivie->setAbsent($absent[$x]);

                $manager->flush();
                $manager->persist($suivie);
            }
            return $this->redirectToRoute('showSequence', ['id' => $id]);

        }
        return $this->render('sequence/absence.html.twig', [
            'sequence' => $sequence, // envoi à la vue les les personnels
            'lesSequences' => $lesSequences, // envoi à la vue les les personnels
            'lesActivites' => $lesActivites,
            'lesPersonnels' => $lesPersonnels,
            'lesEleves' => $lesEleves,
        ]);
    }


}
