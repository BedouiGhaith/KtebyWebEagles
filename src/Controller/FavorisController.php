<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;


class FavorisController extends AbstractController
{
    /**
     * @Route("/favoris", name="app_favoris")
     */
    public function index(): Response
    {
        return $this->render('favoris/index.html.twig', [
            'controller_name' => 'FavorisController',
        ]);
    }
    /**
     * @Route("/userFavoris", name="userFavoris")
     */
    public function readFavoris()
    {
        $repository = $this->getDoctrine()->getRepository(Favoris::class);
        $favoris = $repository->findAll();

        return $this->render('favoris/listFavoris.html.twig', [
            'favoris' => $favoris,
        ]);
    }
    /**
     * @Route("/addFavoris", name="addFavoris")
     */
    public function addFavoris(Request $request)
    {
        $favoris = new Favoris();
        $form = $this->createForm(FavorisType::class, $favoris);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            $favoris = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($favoris);
            $em->flush();
            return $this->redirectToRoute('favorisList');
        }
        return $this->render('favoris/addFavorisWidget.html.twig', [
            'formA' => $form->createView()

        ]);
    }
}
