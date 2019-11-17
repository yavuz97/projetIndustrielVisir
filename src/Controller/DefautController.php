<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefautController extends AbstractController
{
    /**
     * @Route("/", name="defaut_index")
     */
    public function index()
    {
        return $this->render('defaut/index.html.twig', [
            'controller_name' => 'DefautController',
        ]);
    }

    /**
     * @Route("/profile", name="profile_user")
     */
    public function profile()
    {
        return $this->render('defaut/profile.html.twig', [
            'controller_name' => 'DefautController',
        ]);
    }


}
