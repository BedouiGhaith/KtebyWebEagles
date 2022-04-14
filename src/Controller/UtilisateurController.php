<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateurRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\HttpFoundation\Request;


class UtilisateurController extends AbstractController
{
    /**
     * @Route("/utilisateur", name="app_utilisateur")
     */
    public function index(): Response
    {
        return $this->render('utilisateur/index.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
    }
    /**
     * @Route("/usersList", name="usersList")
     */
    public function readUsers()
    {
        $repository = $this->getDoctrine()->getRepository(Utilisateur::class);
        $users = $repository->findAll();

        return $this->render('utilisateur/listUtilisateur.html.twig', [
            'utilisateurs' => $users,
            'controller_name' => 'UtilisateurList',
        ]);
    }
    /**
     * @Route("/addUser", name="addUser")
     */
    public function addUtilisateur(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            $user = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('usersList');
        }
        return $this->render('utilisateur/addUserWidget.html.twig', [
            'controller_name' => 'Ajouter Utilisateur',
            'formAddUser' => $form->createView()

        ]);

    }
    /**
     * @Route("/delete/{id}", name="deleteUser")
     */
    public function deleteUser($id)
    {
        $user = $this->getDoctrine()->getRepository(Utilisateur::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute("usersList");
    }
    /**
     * @Route("/update/{id}", name="updateUser")
     */
    public function updateUser(Request $request, $id)
    {
        $user = $this->getDoctrine()->getRepository(Utilisateur::class)->find($id);
        $form = $this->createForm(UtilisateurType::class, $user);
        $form->add("Modifier", SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('usersList');
        }
        return $this->render("utilisateur/updateUser.html.twig", array('form' => $form->createView()));
    }
}
