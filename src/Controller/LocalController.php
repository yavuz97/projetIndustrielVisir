<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Local;



use App\Entity\Etablissement;
use App\Form\EtablissementType;
use App\Form\LocalFormType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class LocalController extends AbstractController
{
    /**
     * @Route("/locaux", name="les_locaux")
     */
    public function index(Request $request, ObjectManager $manager)
    {

        //REPO LOCAL
        $localRepo = $this->getDoctrine()->getRepository(Local::class);
        $lesLocaux = $localRepo->findAll();
        $non = null;

        //ajout d'une nouvelle local
        $local = new Local();
        $LocalFormType = $this->createForm(LocalFormType::class, $local);
        $LocalFormType->handleRequest($request);
        // formulaire ajout etablissement
        if ($LocalFormType->isSubmitted() && $LocalFormType->isValid()) {

            $manager->persist($local);
            $manager->flush();
            return $this->redirectToRoute('les_locaux');
        }


        return $this->render('local/locaux.html.twig', [


            'local' => $local, // envoi à la vue les les locaux
            'lesLocaux' => $lesLocaux, // envoi à la vue les les locaux
            'localForm' => $LocalFormType->createView(),
            'non' => $non

        ]);

    }



    // ======= modifier un objet user =============
    /**
     * @Route("/local/edit/{id}", name="locaux_edit_local")
     */
    public function editLocal($id, Request $request, ObjectManager $manager)
    {

        $localRepo = $this->getDoctrine()->getRepository(Local::class);
        $local = $localRepo->find($id);




        if ($request->get('local')['valid'] == 'OK') {

            $libelle = $request->get('local')['libelle'];
            $local->setLibelle($libelle);

            $capacite = $request->get('local')['capacite'];
            if ($capacite == null){
                $capacite = 0;
            }
            $local->setCapacite($capacite);


            $utilisation = $request->get('local')['utilisation'];
            $local->setUtilisation($utilisation);

            $specialisee = $request->get('local')['specialisee'];
            $local->setSpecialisee($specialisee);





            $manager->flush();
            return $this->redirectToRoute('les_locaux');
        }
        return $this->render('local/locaux.html.twig', [


            'local' => $local, // envoi à la vue les les locaux



        ]);
    }


    // ======= supprimer un local =======
    /**
     * @Route("/local/delete/{id}", name="locaux_delete_local")
     */
    public function deletelocal($id, ObjectManager $manager)
    {
        $localRepo = $this->getDoctrine()->getRepository(Local::class);
        $local = $localRepo->find($id);


        $manager->remove($local);
        $manager->flush();

        return $this->redirectToRoute('les_locaux');
    }



}
