<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Etablissement;
use App\Form\EleveShowType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Eleve;
use App\Entity\HistoriqueEleve;
use App\Form\EleveType;




use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\Tests\Compiler\D;
use Symfony\Component\Validator\Constraints\Date;




class EleveController extends AbstractController
{

    /* =============== LISTE ELEVE ============*/
    /**
     * @Route("/lesElevesh", name="eleveList")
     */
    public function eleveList()
    {

        //REPO Eleve
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $lesEleves = $eleveRepo->findAll();

        return $this->render('eleve/eleveList.html.twig', [
            'lesEleves' => $lesEleves,
        ]);
    }

    //POUR AFFICHER UNE ELEVE
    /* =============== ELEVE SHOW ============*/
    /**
     * @Route("/eleve/{id}", name="eleve_show")
     */

    public function showEleve($id, Request $request, ObjectManager $manager,AuthorizationCheckerInterface $authChecker)
    {
        //REPO Eleve
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $eleve = $eleveRepo->find($id);


        //REPO Eleve
        $etablissementRepo = $this->getDoctrine()->getRepository(Etablissement::class);
        $lesEtablissements = $etablissementRepo->findAll();


        $form = $this->createForm(EleveShowType::class, $eleve);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form-> isValid()){


            $manager->persist($eleve);
            $manager->flush();

            return $this->redirectToRoute('eleve_show', ['id'=>$eleve->getId()]);
        }


        return $this->render('eleve/eleveShow.html.twig', [
            'form' => $form->createView(),
            'eleve' => $eleve,
            'lesEtablissements' => $lesEtablissements

        ]);
    }



    /* =============== ELEVE BILAN  ============*/
    /**
     * @Route("/eleve/bilan/{id}", name="eleve_bilan")
     */

    public function bilanEleve($id, Request $request, ObjectManager $manager,AuthorizationCheckerInterface $authChecker)
    {
        //REPO Eleve
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $eleve = $eleveRepo->find($id);

        $eleveAjax = $eleveRepo->eleveCherche();
        $eleveTab = $eleveRepo->tableauCroise($id);

        dump($eleveAjax);

        $date1 = new\DateTime();
        $date2 = new\DateTime();

        if ($request->get('bilan')['valid'] == 'OK') {

            $dateUn = $request->get('bilan')['dateUn'];
            if ($dateUn != null){
                $date1 = new\DateTime($dateUn);
            }

            $dateDeux = $request->get('bilan')['dateDeux'];
            if ($dateDeux != null){
                $date2 = new\DateTime($dateDeux);            }


        }


        return $this->render('eleve/eleveBilan.html.twig', [
            'eleve' => $eleve,
            'eleveTab' => $eleveTab,
            'date1' => $date1,
            'date2' => $date2,


        ]);
    }






    /* =============== AJOUT ELEVE ============*/

    /**
     * @Route("/ajoutEleve/new", name="ajoutEleve")
     */


    public function addEleve(Eleve $eleve=null, Request $request, ObjectManager $manager,AuthorizationCheckerInterface $authChecker)
    {
        if(!$eleve){
            $eleve = new Eleve();
        }


        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form-> isValid()){


            $manager->persist($eleve);
            $manager->flush();

            return $this->redirectToRoute('eleve_show', ['id'=>$eleve->getId()]);
        }


        return $this->render('eleve/eleveCreate.html.twig', [
            'form' => $form->createView()
        ]);
    }




    /* =============== AJOUT ELEVE ============*/

    /**
     * @Route("eleve/modifieEleve/{id}", name="modifieEleve")
     */


    public function modifyEleve($id, Request $request, ObjectManager $manager,AuthorizationCheckerInterface $authChecker)
    {
        //REPO Eleve
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $eleve = $eleveRepo->find($id);



        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form-> isValid()){


            $manager->persist($eleve);
            $manager->flush();

            return $this->redirectToRoute('eleve_show', ['id'=>$eleve->getId()]);
        }


        return $this->render('eleve/eleveModifier.html.twig', [
            'form' => $form->createView(),

        ]);
    }



    // ======= supprimer un sequence =======
    /**
     * @Route("/eleve/delete/{id}", name="deleteEleve")
     */
    public function deleteEleve($id, ObjectManager $manager)
    {

        //REPO Eleve
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $eleve = $eleveRepo->find($id);

        $manager->remove($eleve);
        $manager->flush();

        return $this->redirectToRoute('eleveList');
    }



    // ======= nouveau annee soclaire =======
    /**
     * @Route("/eleve/nouveuEntreeScolaire/{id}", name="nouveuEntreeScolaire")
     */
    public function nouveauAnneeScolaire($id, ObjectManager $manager,  Request $request)
    {

        //REPO Eleve
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $eleve = $eleveRepo->find($id);


            $historiqueEleve = new HistoriqueEleve();

            $etablissement= $eleve->getEtablissement();
            $NomEtablissement = $etablissement->getNomEtablissement();
            $historiqueEleve->setNomEtablissement($NomEtablissement);

            $classe =$eleve->getClassOrigine();
            $historiqueEleve->setClasse($classe);

            $entreIrHist = new\dateTime();
            $entreIrHist = $eleve->getEntreeIR();
            if ($entreIrHist <> null ){
                $historiqueEleve->setEntreeIr($entreIrHist);
            }

            $sortieIrHist = new\dateTime();
            $sortieIrHist = $eleve->getSortieIR();
            if ($historiqueEleve <> null){
                $historiqueEleve->setSortieIr($sortieIrHist);
            }


            $motifSortieHist = $eleve->getMotifSortie();
            $historiqueEleve->setMotifSortie($motifSortieHist);

            $anneScolaire = $eleve->getAnneeScolaire();
            $historiqueEleve->setAnneeScolaire($anneScolaire);

            $historiqueEleve->setEleve($eleve);

            $manager->persist($historiqueEleve);
            $manager->flush();


            $nouveauClasseActuelle = $eleve->getClassActuelle();
            $eleve->setClassOrigine($nouveauClasseActuelle);

            $nouveauClasseOrigine = $eleve->getEtablissement();
            $nouveauClasseOrigine = $nouveauClasseOrigine->getNomEtablissement();
            $eleve->setEtabOrigine($nouveauClasseOrigine);

            $etablissementID = $request->get('historique')['etablissement'];
            $etablissementID = (int) filter_var($etablissementID, FILTER_SANITIZE_NUMBER_INT); // extraction de id ( partie integer ) de variable activite

            //REPO etablissement
            $etablissementRepo = $this->getDoctrine()->getRepository(Etablissement::class);
            $etablissement = $etablissementRepo->find($etablissementID);

            $eleve->setEtablissement($etablissement);

            $nouveauClasse = $request->get('historique')['classe'];
            $eleve->setClassActuelle($nouveauClasse);

             $nouveauAnneeScolaire = $request->get('historique')['anneeScolaire'];
            $eleve->setAnneeScolaire($nouveauAnneeScolaire);

                   $manager->persist($eleve);
                $manager->flush();


        return $this->redirectToRoute('eleve_show', ['id'=>$eleve->getId()]);
    }






}
