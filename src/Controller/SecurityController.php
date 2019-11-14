<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;




use Symfony\Component\DependencyInjection\Tests\Compiler\D;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;






class SecurityController extends AbstractController
{

    // route pour s'inscrire
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager,
                                 UserPasswordEncoderInterface $encoder, User $user = null)
    {
        if (!$user) {
            $user = new User();
        }
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setRoles(['ROLE_USER']);  // Il prend par défaut le role user
            $manager->persist($user);
            $manager->flush();
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);

    }


    // route pour connection
    /**
     * @Route("/connexion", name="security_login")
     */
    public function login( ){

        return $this->render('security/login.html.twig');
    }


    /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout()
    {
        return $this->render('security/login.html.twig');
    }

   


}
