<?php

namespace App\Controller;
use App\Entity\Evaluation;
use App\Entity\Livre;
use App\Repository\AvisRepository;
use App\Repository\EvaluationRepository;
use App\Repository\LivreRepository;
use App\Repository\UtilisateurRepository;
use Proxies\__CG__\App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @Route("/Evaluation")
 */
class EvaluationMobileController extends AbstractController
{
    /**
     * @Route("/mobile2", name="app_evaluation_mobile")
     */
    public function index(): Response
    {
        return $this->render('evaluation_mobile/index.html.twig', [
            'controller_name' => 'EvaluationMobileController',
        ]);
    }

    //LISTE EVENTS
    /**
     * @Route("/listEvaluationMo", name="list_Evaluation")
     */
    function  getEvaluation(EvaluationRepository  $repo, NormalizerInterface $normalizer){

        $evaluation=$repo->findAll();
        $jsonContent=$normalizer->normalize($evaluation,'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
        /*http://127.0.0.1:8000/Evaluation/listEvaluationMo*/
    }


    //ONE CLUB
    /**
     * @Route("/EvaluationM/{id_evaluation}", name="Evaluationid")
     */
    public function  Evaluationd(Request $request , $id_evaluation ,NormalizerInterface $Normalizer){

        $em = $this->getDoctrine()->getManager();
        $evaluation = $em->getRepository(Evaluation::class)->find($id_evaluation);
        $jsonContent=$Normalizer->normalize($evaluation ,'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
        /*http://127.0.0.1:8000/Evaluation/EvaluationM/26 */
    }

    //ADD EVENT
    /*
        /**
         * @Route("/addAvisJSON/new/", name="addAvisjSON", methods={"GET", "POST"})
         */
    /* public function addAvisJSON(Request $request, NormalizerInterface $Normalizer,UtilisateurRepository $repo1,LivreRepository $repo,$id_livre,$id_user)
    {
        $em = $this->getDoctrine()->getManager();
        $avi = new Avis();
        $avi->setCommentaire($request->get('commentaire'));
        $avi->setIdLivre($repo->find(29));
        $avi->setIdUser($repo1->find(8));


        $em->persist($avi);
        $em->flush();
        $jsonContent=$Normalizer->normalize($avi,'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }
/*http://127.0.0.1:8001/Avis/addAvisJSON/new/?commentaire=bonuit*/

    /**
     * @Route("/addEvaluationJSON/new/", name="addEvaluationJSON", methods={"GET", "POST"})
     */
    public function addEvaluationJSON(Request $request, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $evaluation = new Evaluation();
        $evaluation->setidLivre($request->get('id_livre'));
        $evaluation->setIsEvaluated($request->get('id_evaluation'));
        $evaluation->setnbStars($request->get('nb_stars'));

        $em->persist($evaluation);
        $em->flush();
        $jsonContent=$Normalizer->normalize($evaluation,'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
        /*http://127.0.0.1:8000/clb/addClubJSON/new/?nom_club=nejet&club_owner=nojnoj&access=public&imageclb=f780fa4f92fa335b578ffe4c38829d50.png*/
    }

    //UPDATE Avis

    /**
     * @Route("/updateEvaluationJSON/{id_evaluation}", name="updateEvaluationJSON", methods={"GET", "POST"})
     */
    public function updateEvaluationJSON($id_evaluation,Request $request, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $evaluation = $em->getRepository(Evaluation::class)->find(id_evaluation);
        $evaluation->setnbStars($request->get('nb_stars'));

        $em->flush();
        $jsonContent=$Normalizer->normalize($evaluation,'json',['groups'=>'post:read']);
        return new Response("Evaluation updated successfully".json_encode($jsonContent));
        /*http://127.0.0.1:8000/clb/updateClubJSON/22?nom_club=nejetx&description=xxxx&club_owner=xxxxx&imageclb=cfe44b89e1f73aa35a564f235121e914.png&access=public*/
        /*http://127.0.0.1:8000/Evaluation/updateEvaluationJSON/26?nb_stars=3 */
    }

    //DELETE Avis

    /**
     * @Route("/deleteEvaluationJSON/{id_evaluation}", name="deleteEvaluationJSON")
     */
    public function deleteEvaluationJSON($id_evaluation,Request $request,NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $evaluation = $em->getRepository(Evaluation::class)->find($id_evaluation);
        $em->remove($evaluation);
        $em->flush();

        $jsonContent=$Normalizer->normalize($evaluation,'json',['groups'=>'post:read']);
        return new Response("Evaluation deleted successfully".json_encode($jsonContent));
        /*http://127.0.0.1:8000/clb/deleteClubJSON/22*/
    }





}
