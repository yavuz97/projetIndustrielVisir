<?php

namespace App\Controller;

use App\Entity\SuivieActivite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SuivieActiviteController extends AbstractController
{


    /* =============== LISTE SUIVIE-ACTIVITE ============*/
    /**
     * @Route("/suivie/Index", name="suivieIndex")
     */
    public function indexSuivie()
    {

        //REPO Eleve
        $suivieRepo = $this->getDoctrine()->getRepository(SuivieActivite::class);
        $lesSuivies = $suivieRepo->findAll();

        return $this->render('suivie_activite/suivieIndex.html.twig', [
            'lesSuivies' => $lesSuivies,
        ]);
    }

    /* =============== LISTE SUIVIE-ACTIVITE ============*/
    /**
     * @Route("/lesSuivies", name="eleveList")
     */
    public function suivieActiviteList()
    {

        //REPO Eleve
        $suivieRepo = $this->getDoctrine()->getRepository(SuivieActivite::class);
        $lesSuivies = $suivieRepo->findAll();

        return $this->render('eleve/lesSuivies.html.twig', [
            '$lesSuivies' => $lesSuivies,
        ]);
    }













}
