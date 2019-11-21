<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


use App\Entity\Role;
use App\Entity\User;
use App\Form\RoleType;
use App\Form\registrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RootController extends AbstractController
{

    // ======= control de pannel principal et l'ajout d'objet user =======
    /**
     * @Route("/user", name="root_user")
     */
    public function user(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        // REPO ROLE
        $repoRole = $this->getDoctrine()->getRepository(Role::class);
        $roles = $repoRole->findAll();
        // REPO USER
        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();

        if ($request->get('user')['valid'] == 'OK') {

            $user = new User();

            // récupère le prénom et le nom en minuscule
            $prenom = strtolower($request->get('user')['prenom']);
            $user->setPrenom($prenom);

            $nom = strtolower($request->get('user')['nom']);
            $user->setNom($nom);

            $user->setUsername($prenom . "." . $nom); // concaténation du prénom et du nom de famille pour créer l'identifiant

            $email = $request->get('user')['email'];
            $user->setEmail($email);


            $role = $request->get('user')['roles'];
            $upperRole = strtoupper($role);
            $tabRole = explode(' ', $upperRole);
            $composeRole = implode('_', $tabRole);
            $role = 'ROLE_' . $composeRole;
            $user->setRoles([$role]);

            $password = '123456789'; // mot de passe par défaut pour tous les nouveaux utilisateurs
            $hash = $encoder->encodePassword($user, $password);
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('root_user');
        }

        return $this->render('root/user.html.twig', [
            'roles' => $roles, // envoi à la vue les rôles
            'users' => $users, // envoi à la vue les utilisateurs
        ]);

    }

    // ======= réinitialiser le mot de passe de user =======

    /**
     * @Route("/user/reset/password/{id}", name="root_reset_password_user")
     */
    public function resetPasswordUser($id, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repoUser->find($id);

        $password = '123456789';
        $hash = $encoder->encodePassword($user, $password);
        $user->setPassword($hash);

        $manager->flush();

        return $this->redirectToRoute('root_user');
    }

    // ======= modifier un objet user =============
    /**
     * @Route("/user/edit/{id}", name="root_edit_user")
     */
    public function editUser($id, Request $request, ObjectManager $manager)
    {

        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repoUser->find($id);

        if ($request->get('user')['valid'] == 'OK') {
            // récupère le prénom et le nom en minuscule
            $prenom = strtolower($request->get('user')['firstname']);
            $user->setPrenom($prenom);

            $nom = strtolower($request->get('user')['lastname']);
            $user->setNom($nom);

            $user->setUsername($prenom . "." . $nom); // concaténation du prénom et du nom de famille pour créer l'identifiant

            $email = $request->get('user')['email'];
            $user->setEmail($email);


            $role = $request->get('user')['roles'];
            $upperRole = strtoupper($role);
            $tabRole = explode(' ', $upperRole);
            $composeRole = implode('_', $tabRole);
            $role = 'ROLE_' . $composeRole;
            $user->setRoles([$role]);

            $manager->flush();

            return $this->redirectToRoute('root_user');
        }
        return $this->redirectToRoute('root_user');
    }


    //  ======= modifier un user
    /**
     * @Route("/user/delete/{id}", name="root_delete_user")
     */
    public function deleteUser($id, ObjectManager $manager)
    {
        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repoUser->find($id);

        $manager->remove($user);
        $manager->flush();

        return $this->redirectToRoute('root_user');
    }


    // ======= administration des role
    /**
     * @Route("/role", name="root_role")
     */
    public function role(Request $request, ObjectManager $manager)
    {
        // REPO ROLE
        $repoRole = $this->getDoctrine()->getRepository(Role::class);
        $roles = $repoRole->findAll();
        // FORM ROLE
        $role = new Role();
        $formRole = $this->createForm(RoleType::class, $role);
        $formRole->handleRequest($request);
        // FORM ROLE PROCESSING
        if ($formRole->isSubmitted() && $formRole->isValid()) {
            $manager->persist($role);
            $manager->flush();
            return $this->redirectToRoute('root_role');
        }
        return $this->render('root/role.html.twig', [
            'roles' => $roles,
            'formRole' => $formRole->createView(),
        ]);
    }

     // ======= supprimer un role =======
    /**
     * @Route("/role/delete/{id}", name="root_delete_role")
     */
    public function deleteRole($id, ObjectManager $manager)
    {
        $repoRole = $this->getDoctrine()->getRepository(Role::class);
        $role = $repoRole->find($id);

        $manager->remove($role);
        $manager->flush();

        return $this->redirectToRoute('root_role');
    }


}
