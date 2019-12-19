<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Etablissement;
use App\Entity\Personnel;
use App\Entity\VoiturePersonnel;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetada;
use Symfony\Component\Validator\Constraint\DateTime;

use App\Form\PersonnelType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;



use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class PersonnelController extends AbstractController
{
    /**
     * @Route("/personnels", name="les_personnels")
     */
    public function index(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {



        //REPO PERONNEL
        $personnelRepo = $this->getDoctrine()->getRepository(Personnel::class);
        $lesPersonnels = $personnelRepo->findAll();


        //REPO PERONNEL ACTIVITE
     //   $personnelActiviteRepo = $this->getDoctrine()->getRepository(PersonnelActivite::class);
     //   $lesPersonnelActivite = $personnelActiviteRepo->findAll();


        //REPO PERONNEL ACTIVITE
        $ActiviteRepo = $this->getDoctrine()->getRepository(Activite::class);
        $lesActivites = $ActiviteRepo->findAll();

        // REPO USER
        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();

        $repoVoiture = $this->getDoctrine()->getRepository(VoiturePersonnel::class);
        $voitures = $repoVoiture->findAll();

        $etabliRepo = $this->getDoctrine()->getRepository(Etablissement::class);
        $etabli = $etabliRepo->findAll();

        //ajout d'une nouvelle personnel
        $personnel = new Personnel();
        $user = new User();
        $voiture = new VoiturePersonnel();
        $personnelForm = $this->createForm(PersonnelType::class, $personnel);
        $personnelForm->handleRequest($request);

        // formulaire ajout personnel
        if ($personnelForm->isSubmitted() && $personnelForm->isValid()) {

            //####### CREATION DE USER ##########
            // récupère le prénom et le nom en minuscule
            $prenom = strtolower($request->get('user')['prenom']);
            $user->setPrenom($prenom);

            $nom = strtolower($request->get('user')['nom']);
            $user->setNom($nom);

            $user->setUsername($prenom . "." . $nom); // concaténation du prénom et du nom de famille pour créer l'identifiant

            $email = $request->get('user')['email'];
            $user->setEmail($email);
            // role par défaut est professeur
            $user->setRoles(['ROLE_PROFESSEUR']);

            $password = '123456789'; // mot de passe par défaut pour tous les nouveaux utilisateurs
            $hash = $encoder->encodePassword($user, $password);
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();
            // -------- FIN USER -------------

            //####### CREATION DE PERSONNEL ##########
            $personnel->setUser($user);
            $manager->persist($personnel);
            $manager->flush();
            // -------- FIN PERSONNEL -------------


            //####### CREATION DE VOITURE ##########


            $marque = $request->get('voiture')['marque'];
            $voiture->setMarque($marque);

            $modele = $request->get('voiture')['modele'];
            $voiture->setModele($modele);

            $couleur = $request->get('voiture')['couleur'];
            $voiture->setCouleur($couleur);


            $badge = $request->get('voiture')['badge'];
            $voiture->setBadge($badge);


            $immarticulation = $request->get('voiture')['immarticulation'];
            $voiture->setImmarticulation($immarticulation);

            $voiture->setPersonnel($personnel);

            if ($immarticulation != null){
            $manager->persist($voiture);
            $manager->flush();
            }
            // -------- FIN VOITURE -------------

            //######### CREATION DE OBJET PERSONNEL ACTIVITE ############


            for ($x = 0; $x < count($request->get('personnelActivite')['activite']); $x++) {

                $formActiviteValide = $request->get('personnelActivite')['activite'][$x];
                if ($formActiviteValide <> "aucune"){




              //  $nouveauPersonnelActivite= new PersonnelActivite(); // instance pour ajouter une caractéristique

            //    $nouveauPersonnelActivite->setPersonnel_id($personnel->getId());

                $activite = $request->get('personnelActivite')['activite'][$x]; // activite recupere id et nom de activité
                $idActivite = (int) filter_var($activite, FILTER_SANITIZE_NUMBER_INT); // extraction de id ( partie integer ) de variable activite

                    $activiteRepo = $this->getDoctrine()->getRepository(Activite::class);
                    $activite = $activiteRepo->find($idActivite);

                    $personnel->addLesActivite($activite);

              //  $nouveauPersonnelActivite->setActivite_id($idActivite);


                $manager->persist($activite);
                $manager->flush();
                }
            }



            // -------- FIN PERSONNEL ACTIVITE -------------



            return $this->redirectToRoute('les_personnels');
        }



        return $this->render('personnel/personnels.html.twig', [
            'personnelForm' => $personnelForm->createView(),
            'lesPersonnels' => $lesPersonnels, // envoi à la vue les les personnels
            'lesActivites' => $lesActivites,
            'users' => $users,
            'etabli'=>$etabli

        ]);

    }


    /**
     * @Route("/indexPerso", name="les_personnelss")
     */
    public function essaie( Request $request, ObjectManager $manager)
    {


        $id = 64;
        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repoUser->find($id);
        dump($user);

        $lesPersonnel = $user->getLesPersonnels();
        foreach ($lesPersonnel as $personnel){
            dump($personnel);
            $etablissement = $personnel->getEtablissement();
            dump($etablissement);
            $lesVoiture = $personnel->getLesVoitures();
            foreach ($lesVoiture as $voiture){
                dump($voiture);
            }
        }


        /*
        //REPO PERONNEL
        $personnelRepo = $this->getDoctrine()->getRepository(Personnel::class);
        $personnel = $personnelRepo->find($id);
        dump($personnel);



        $repoVoiture = $this->getDoctrine()->getRepository(VoiturePersonnel::class);
        $voiture = $repoVoiture->find($id);
        dump($voiture);
*/



        return $this->render('personnel/index.html.twig', [


            'personnel' => $personnel, // envoi à la vue les les personnels


        ]);

    }


    // ======= modifier un objet personnel =============
    /**
     * @Route("/personnels/edit/{id}", name="personnels_edit_personnel")
     */
    public function editPersonnel($id, Request $request, ObjectManager $manager)
    {



        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repoUser->find($id);

        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repoUser->find($id);

        $lesPersonnel = $user->getLesPersonnels();
        foreach ($lesPersonnel as $personnel){

            $lesVoiture = $personnel->getLesVoitures();
            foreach ($lesVoiture as $voiture){
            }
        }


        // formulaire ajout personnel
        if ($request->get('personnel')['valid'] == 'OK') {

            //####### CREATION DE USER ##########
            // récupère le prénom et le nom en minuscule
            $prenom = strtolower($request->get('user')['prenom']);
            $user->setPrenom($prenom);

            $nom = strtolower($request->get('user')['nom']);
            $user->setNom($nom);

            $user->setUsername($prenom . "." . $nom); // concaténation du prénom et du nom de famille pour créer l'identifiant

            $email = $request->get('user')['email'];
            $user->setEmail($email);
            // role par défaut est professeur
            $user->setRoles(['ROLE_PROFESSEUR']);




            $tel = $request->get('personnel')['tel'];
            $tel = (int) filter_var($tel, FILTER_SANITIZE_NUMBER_INT);
            $personnel->setTel($tel);

            $organisme = $request->get('personnel')['organisme'];
            $personnel->setOrganisme($organisme);

            $etablissement = $request->get('personnel')['etablissement'];
            $idEtablissement = (int) filter_var($etablissement, FILTER_SANITIZE_NUMBER_INT); // extraction de id ( partie integer ) de variable activite

            $etablissementRepo = $this->getDoctrine()->getRepository(Etablissement::class);
            $etablissement = $etablissementRepo->find($idEtablissement);

            $personnel->setEtablissement($etablissement);

            $fonction = $request->get('personnel')['fonction'];
            $personnel->setFonction($fonction);

            $numCarteXpass = $request->get('personnel')['numCarteXpass'];
            $personnel->setNumCarteXpass($numCarteXpass);

            $actionIR = $request->get('personnel')['actionIR'];

            $personnel->setActionIR($actionIR);

            $responsable = $request->get('personnel')['responsable'];
            $personnel->setResponsable($responsable);

            $tp = $request->get('personnel')['tp'];
            $tp = (int) filter_var($tp, FILTER_SANITIZE_NUMBER_INT);
            $personnel->setTp($tp);

            $date = new\DateTime("21-08-1997");
          //  echo $date->format('Y-m-d H:i:s');
            dump(date_format($date, 'd/m/y'));
            dump($date);


            $dateEntree = $request->get('personnel')['dateEntree'];
            $dateE = new\DateTime($dateEntree);
            $personnel->setDateEntree($dateE);

            $dateSortie = $request->get('personnel')['dateSortie'];
            $dateS = new\DateTime($dateSortie);
            $personnel->setDateSortie($dateS);

            $niveauEtude = $request->get('personnel')['niveauEtude'];
            $personnel->setNiveauEtude($niveauEtude);

            $hautDiplome = $request->get('personnel')['hautDiplome'];
            $personnel->setHautDiplome($hautDiplome);

            $specialite = $request->get('personnel')['specialite'];
            $personnel->setSpecialite($specialite);

            $formationEnCours = $request->get('personnel')['formationEnCours'];
            $personnel->setFormationEnCours($formationEnCours);

            $droit200h = $request->get('personnel')['droit200h'];
            $personnel->setDroit200h($droit200h);

            $manager->flush();
            // -------- FIN USER -------------


            // -------- FIN PERSONNEL -------------


            //####### CREATION DE VOITURE ##########
            $immarticulation = $request->get('voiture')['immarticulation'];
            if ($immarticulation != null){
            $marque = $request->get('voiture')['marque'];
            $voiture->setMarque($marque);

            $modele = $request->get('voiture')['modele'];
            $voiture->setModele($modele);

            $couleur = $request->get('voiture')['couleur'];
            $voiture->setCouleur($couleur);


            $badge = $request->get('voiture')['badge'];
            $voiture->setBadge($badge);


            $immarticulation = $request->get('voiture')['immarticulation'];
            $voiture->setImmarticulation($immarticulation);

            $voiture->setPersonnel($personnel);



                $manager->flush();
            }
            // -------- FIN VOITURE -------------



            //######### CREATION DE OBJET PERSONNEL ACTIVITE ############


            for ($x = 0; $x < count($request->get('personnelActivite')['activite']); $x++) {

                $formActiviteValide = $request->get('personnelActivite')['activite'][$x];
                if ($formActiviteValide <> "aucune"){




                    //  $nouveauPersonnelActivite= new PersonnelActivite(); // instance pour ajouter une caractéristique

                    //    $nouveauPersonnelActivite->setPersonnel_id($personnel->getId());

                    $activite = $request->get('personnelActivite')['activite'][$x]; // activite recupere id et nom de activité
                    $idActivite = (int) filter_var($activite, FILTER_SANITIZE_NUMBER_INT); // extraction de id ( partie integer ) de variable activite

                    $activiteRepo = $this->getDoctrine()->getRepository(Activite::class);
                    $activite = $activiteRepo->find($idActivite);

                    $personnel->addLesActivite($activite);

                    //  $nouveauPersonnelActivite->setActivite_id($idActivite);



                    $manager->flush();
                }
            }




            return $this->redirectToRoute('les_personnels');
        }





        return $this->render('personnel/personnels.html.twig', [


            'personnel' => $personnel // envoi à la vue les les personnels

        ]);
    }



    // ======= ajouter un voiture =======
    /**
     * @Route("/personnels/voitureAjouter/{id}", name="personnels_voiture_ajouter")
     */
    public function ajouterVoiturePersonnel($id, ObjectManager $manager, Request $request)
    {

        $repoPerso = $this->getDoctrine()->getRepository(Personnel::class);
        $personnel = $repoPerso->find($id);

        $voiture = new VoiturePersonnel();

        if ($request->get('voiture')['valid'] == 'OK'){

                        $marque = $request->get('voiture')['marque'];
                        $voiture->setMarque($marque);

                        $modele = $request->get('voiture')['modele'];
                        $voiture->setModele($modele);

                        $couleur = $request->get('voiture')['couleur'];
                        $voiture->setCouleur($couleur);


                        $badge = $request->get('voiture')['badge'];
                        $voiture->setBadge($badge);


                        $immarticulation = $request->get('voiture')['immarticulation'];
                        $voiture->setImmarticulation($immarticulation);

                        $voiture->setPersonnel($personnel);
                        $manager->persist($voiture);
                        dump($voiture);
                        $manager->flush();

        }
        return $this->redirectToRoute('les_personnels');
    }


    // ======= supprimer un personnel =======
    /**
     * @Route("/personnels/delete/{id}", name="personnels_delete_personnel")
     */
    public function deletePersonnel($id, ObjectManager $manager)
    {

        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repoUser->find($id);

        $manager->remove($user);
        $manager->flush();

        return $this->redirectToRoute('les_personnels');
    }

    // ======= supprimer un voiture =======
    /**
     * @Route("/voiture/delete/{id}", name="personnels_delete_voiture")
     */
    public function deleteVoiturel($id, ObjectManager $manager)
    {

        $repoVoiture = $this->getDoctrine()->getRepository(VoiturePersonnel::class);
        $voiture = $repoVoiture->find($id);

        $manager->remove($voiture);
        $manager->flush();

        return $this->redirectToRoute('les_personnels');
    }


    // ======= supprimer un activité =======
    /**
     * @Route("/personnels/activite/{id}", name="personnels_delete_activite")
     */
    public function deleteActivite($id, ObjectManager $manager)
    {

        dump($id);



        $repoPerso = $this->getDoctrine()->getRepository(Personnel::class);
        $personnel = $repoPerso->find($id);

        $lesActivies = $personnel->getLesActivites();
        foreach ($lesActivies as $acitive){
            $idActivite = $acitive->getId();
            $repoActivite = $this->getDoctrine()->getRepository(Activite::class);
            $acitive = $repoActivite->find($idActivite);

            $personnel->removeLesActivite($acitive);
        }

        $manager->flush();

        return $this->redirectToRoute('les_personnels');
    }






}
