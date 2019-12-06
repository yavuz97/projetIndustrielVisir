<?php

namespace App\Controller;

use App\Entity\Personnel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;




use App\Form\PersonnelType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;


class PersonnelController extends AbstractController
{
    /**
     * @Route("/personnels", name="les_personnels")
     */
    public function index(Request $request, ObjectManager $manager)
    {
        //REPO ETABLISSEMENT
        $personnelRepo = $this->getDoctrine()->getRepository(Personnel::class);
        $lesPersonnels = $personnelRepo->findAll();



        //ajout d'une nouvelle personnel
        $personnel = new Personnel();
        $personnelForm = $this->createForm(PersonnelType::class, $personnel);
        $personnelForm->handleRequest($request);




        // formulaire ajout personnel
        if ($personnelForm->isSubmitted() && $personnelForm->isValid()) {

            $manager->persist($personnel);
            $manager->flush();


            return $this->redirectToRoute('les_personnels');
        }



        return $this->render('personnel/index.html.twig', [
            'personnelForm' => $personnelForm->createView(),
            'personnel' => $personnel, // envoi à la vue les personnel
            'lesPersonnels' => $lesPersonnels, // envoi à la vue les les personnels

        ]);

    }



    // ======= modifier un objet personnel =============
    /**
     * @Route("/personnels/edit/{id}", name="personnels_edit_personnel")
     */
    public function editPersonnel($id, Request $request, ObjectManager $manager)
    {

        $personnelRepo = $this->getDoctrine()->getRepository(Personnel::class);
        $personnel = $personnelRepo->find($id);




        if ($request->get('personnel')['valid'] == 'OK') {

            $nomEtablissement = $request->get('personnel')['nomEtablissement'];
            $personnel->setNomEtablissement($nomEtablissement);

            $codeRNE = $request->get('personnel')['codeRNE'];
            $personnel->setCodeRNE($codeRNE);

            $secteurMetz = $request->get('personnel')['secteurMetz'];
            $personnel->setSecteurMetz($secteurMetz);

            $chefEtablissement = $request->get('personnel')['chefEtablissement'];
            $personnel->setChefEtablissement($chefEtablissement);

            $adjoint = $request->get('personnel')['adjoint'];
            $personnel->setAdjoint($adjoint);

            $referentES = $request->get('personnel')['referentES'];
            $personnel->setReferentES($referentES);

            $telReferent = $request->get('personnel')['telReferent'];
            $personnel->setTelReferent($telReferent);

            $ville = $request->get('personnel')['ville'];
            $personnel->setVille($ville);

            $adresse = $request->get('personnel')['adresse'];
            $personnel->setAdresse($adresse);

            $codePostal = $request->get('personnel')['codePostal'];
            $personnel->setCodePostal($codePostal);

            $telVieScolaire = $request->get('personnel')['telVieScolaire'];
            $personnel->setTelVieScolaire($telVieScolaire);

            $telStandard = $request->get('personnel')['telStandard'];
            $personnel->setTelStandard($telStandard);

            $manager->flush();
            // specifications
            for ($x = 0; $x < count($request->get('specification')['cpePrenom']); $x++) {
                $nouveauCpe = new CpeEtablissement(); // instance pour ajouter une caractéristique

                $nouveauCpe->setEtablissement($personnel);

                $etablissementCpePrenom = $request->get('specification')['cpePrenom'][$x];
                $nouveauCpe->setPrenom($etablissementCpePrenom);

                $etablissementCpeNom = $request->get('specification')['cpeNom'][$x];
                $nouveauCpe->setNom($etablissementCpeNom);
                $manager->persist($nouveauCpe);
                $manager->flush();
            }


            return $this->redirectToRoute('les_personnels');
        }



        $data = 1;// obtain current value of data from somewhere


        return $this->render('personnel/personnels.html.twig', [


            'personnel' => $personnel, // envoi à la vue les les personnels
            'data' => $data

        ]);
    }


    // ======= supprimer un personnel =======
    /**
     * @Route("/personnels/delete/{id}", name="personnels_delete_etablissement")
     */
    public function deletePersonnel($id, ObjectManager $manager)
    {
        $personnelRepo = $this->getDoctrine()->getRepository(Personnel::class);
        $personnel= $personnelRepo->find($id);
        $manager->remove($personnel);
        $manager->flush();

        return $this->redirectToRoute('les_personnels');
    }







}
