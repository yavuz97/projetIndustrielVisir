<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Eleve;
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
     * @Route("/eleve", name="eleve")
     */
    public function eleveList()
    {

        //REPO Eleve
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $lesEleves = $eleveRepo->findAll();

        return $this->render('eleve/index.html.twig', [
            'lesEleves' => $lesEleves,
        ]);
    }

    //POUR AFFICHER UNE ELEVE
    /* =============== ELEVE SHOW ============*/
    /**
     * @Route("/eleve/{id}", name="eleve_show")
     */

    public function showMachine($id,  AuthorizationCheckerInterface $authChecker)
    {
        //REPO Eleve
        $eleveRepo = $this->getDoctrine()->getRepository(Eleve::class);
        $eleve = $eleveRepo->find($id);

        return $this->render('eleve/eleveShow.html.twig', [
            'eleve' => $eleve,
        ]);
    }





        /* =============== AJOUT ELEVE ============*/

    /**
     * @Route("/ajoutEleve/new", name="ajoutEleve")
     * @Route("/modifieEleve/{id}", name="modifieEleve")
     */


    public function addEleve(Eleve $eleve=null, Request $request, ObjectManager $manager,AuthorizationCheckerInterface $authChecker)
    {
        if(!$eleve){
            $eleve = new Eleve();
        }
        dump($eleve);
        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form-> isValid()){


            $manager->persist($eleve);
            $manager->flush();

            return $this->redirectToRoute('eleve_show', ['id'=>$eleve->getId()]);
        }


        return $this->render('eleve/eleveCreate.html.twig', [
            'form' => $form->createView(),
            'editMode' => $eleve->getId() !== null

        ]);
    }






}
