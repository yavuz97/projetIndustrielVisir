<?php

namespace App\Controller;

use App\Entity\CpeEtablissement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



use App\Entity\Etablissement;
use App\Form\EtablissementType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;


class EtablissementController extends AbstractController
{
    /**
     * @Route("/etablissements", name="les_etablissements")
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


            for ($x = 0; $x < count($request->get('specification')['cpePrenom']); $x++) {
                $nouveauCpe = new CpeEtablissement(); // instance pour ajouter une caractéristique

                $nouveauCpe->setEtablissement($etablissement);

                $etablissementCpePrenom = $request->get('specification')['cpePrenom'][$x];
                $nouveauCpe->setPrenom($etablissementCpePrenom);

                $etablissementCpeNom = $request->get('specification')['cpeNom'][$x];
                $nouveauCpe->setNom($etablissementCpeNom);
                $manager->persist($nouveauCpe);
                $manager->flush();
            }

            return $this->redirectToRoute('les_etablissements');
        }



        return $this->render('etablissement/etablissements.html.twig', [
            'etablissementForm' => $etablissementForm->createView(),
            'etablissement' => $etablissement, // envoi à la vue les etablissement
            'lesEtablissement' => $lesEtablissement, // envoi à la vue les les etablissements

        ]);

    }

// ======= AJOUTER CPE A UNE ETABLISSEMENT =============
    /**
     * @Route("/etablissementsCpe/{id}", name="ajoutCpeEtablissement")
     */
    public function ajoutCpe($id, Request $request, ObjectManager $manager)
    {

        $etablissementeRepo = $this->getDoctrine()->getRepository(Etablissement::class);
        $etablissement = $etablissementeRepo->find($id);

            if ($request->get('etablissement')['valid'] == 'OK') {
                $nouveauCpe = new CpeEtablissement(); // instance pour ajouter une caractéristique

                $nouveauCpe->setEtablissement($etablissement);

                $etablissementCpePrenom = $request->get('etablissementCpe')['nom'];
                $nouveauCpe->setPrenom($etablissementCpePrenom);

                $etablissementCpeNom = $request->get('etablissementCpe')['prenom'];
                $nouveauCpe->setNom($etablissementCpeNom);
                $manager->persist($nouveauCpe);
                $manager->flush();
            }

            return $this->redirectToRoute('les_etablissements');


    }


    // ======= modifier un objet user =============
    /**
     * @Route("/etablissements/edit/{id}", name="etablissements_edit_etablissement")
     */
    public function editLocal($id, Request $request, ObjectManager $manager)
    {

        $etablissementeRepo = $this->getDoctrine()->getRepository(Etablissement::class);
        $etablissement = $etablissementeRepo->find($id);




        if ($request->get('etablissement')['valid'] == 'OK') {

            $nomEtablissement = $request->get('etablissement')['nomEtablissement'];
            $etablissement->setNomEtablissement($nomEtablissement);

            $codeRNE = $request->get('etablissement')['codeRNE'];
            $etablissement->setCodeRNE($codeRNE);

            $secteurMetz = $request->get('etablissement')['secteurMetz'];
            if(is_string($secteurMetz)){
                $secteurMetz = 0;
            }
            $etablissement->setSecteurMetz($secteurMetz);

            $chefEtablissement = $request->get('etablissement')['chefEtablissement'];
            $etablissement->setChefEtablissement($chefEtablissement);

            $adjoint = $request->get('etablissement')['adjoint'];
            $etablissement->setAdjoint($adjoint);

            $referentES = $request->get('etablissement')['referentES'];
            $etablissement->setReferentES($referentES);

            $telReferent = $request->get('etablissement')['telReferent'];
            if(is_string($telReferent)){
                $telReferent = null;
            }
            $etablissement->setTelReferent($telReferent);

            $ville = $request->get('etablissement')['ville'];
            $etablissement->setVille($ville);

            $adresse = $request->get('etablissement')['adresse'];
            $etablissement->setAdresse($adresse);

            $codePostal = $request->get('etablissement')['codePostal'];
            if(is_string($codePostal)){
                $codePostal = null;
            }
            $etablissement->setCodePostal($codePostal);

            $telVieScolaire = $request->get('etablissement')['telVieScolaire'];
            if(is_string($telVieScolaire)){
                $telVieScolaire = null;
            }
            $etablissement->setTelVieScolaire($telVieScolaire);

            $telStandard = $request->get('etablissement')['telStandard'];
            if(is_string($telStandard)){
                $telStandard = null;
            }
            $etablissement->setTelStandard($telStandard);


            $cpeEtab = $etablissement->getLesCpeEtablissement();
            foreach ($cpeEtab as $cpe){

                $cpePernom = $request->get('etablissementCpe')['prenom'];
                $cpe->setPrenom($cpePernom);

                $cpeNom = $request->get('etablissementCpe')['nom'];
                $cpe->setNom($cpeNom);

            }
            $manager->flush();

            return $this->redirectToRoute('les_etablissements');
        }



            $data = 1;// obtain current value of data from somewhere


        return $this->render('etablissement/etablissements.html.twig', [


            'etablissement' => $etablissement, // envoi à la vue les les etablissements
            'data' => $data

        ]);
    }


    // ======= supprimer un etablissement =======
    /**
     * @Route("/etablissements/delete/{id}", name="etablissements_delete_etablissement")
     */
    public function deleteEtablissement($id, ObjectManager $manager)
    {
        $etablissementRepo = $this->getDoctrine()->getRepository(Etablissement::class);
        $etablissement= $etablissementRepo->find($id);
        $cpeEtab = $etablissement->getLesCpeEtablissement();

        foreach ($cpeEtab as $cpe){

            $etablissement->removeLesCpeEtablissement($cpe);
            $manager->remove($cpe);
        }

        $lesEleves = $etablissement->getLesEleves();

        foreach ($lesEleves as $eleve){
            $etablissement->removeLesElefe($eleve);
        }

        $manager->remove($etablissement);

        $manager->flush();

        return $this->redirectToRoute('les_etablissements');
    }


    // ======= supprimer un cpe =======
    /**
     * @Route("/etablissements/deleteCpe/{id}", name="etablissements_delete_CPE")
     */
    public function deleteCpe($id, ObjectManager $manager)
    {
        $cpeRepo = $this->getDoctrine()->getRepository(CpeEtablissement::class);
        $cpe= $cpeRepo->find($id);
        $manager->remove($cpe);
        $manager->flush();

        return $this->redirectToRoute('les_etablissements');
    }




}
