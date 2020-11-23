<?php

namespace App\Controller;

use App\Entity\Fiche;
use App\Entity\Forfait;
use App\Entity\HorsForfait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ForfaitFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FicheController extends AbstractController
{
    /**
     * @Route("/fiche/{id_Fiche}", name="fiche")
     */
    public function modifier($id_Fiche): Response
    {
        $repository = $this->getDoctrine()->getRepository(Fiche::class);
        $laFiche = $repository->find($id_Fiche);
        $repository = $this->getDoctrine()->getRepository(Forfait::class);
        $lesForfaits = $repository->findForfaitByFiche($id_Fiche);
        $repository = $this->getDoctrine()->getRepository(HorsForfait::class);
        $lesHorsForfaits = $repository->findHForfaitByFiche($id_Fiche);

        return $this->render('fiche/modifFiche.html.twig',['fiche' => $laFiche,'lesHorsForfait' => $lesHorsForfaits ,'lesForfaits' => $lesForfaits]);
    }
    /**
     * @Route("/fiche/forfait/{id_Fiche}", name="modifForfait")
     */
    public function modifierForfait($id_Fiche,Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(Fiche::class);
        $laFiche = $repository->find($id_Fiche);
        $repository = $this->getDoctrine()->getRepository(Forfait::class);
        $lesForfaits = $repository->findForfaitByFiche($id_Fiche);

        $form = $this->createForm(ForfaitFormType::class,$id_Fiche);
        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid())
        {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            $this->redirectToRoute("menu");
        }
        return $this->render('fiche/modifFiche.html.twig',['form' => $form->createView(),'fiche' => $laFiche,'lesForfaits' => $lesForfaits]);
    }
    /**
     * @Route("/fiche/Hforfait/{id_Fiche}", name="modifForfait")
     */
    public function modifierHorsForfait($id_Fiche,Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(Fiche::class);
        $laFiche = $repository->find($id_Fiche);
        $repository = $this->getDoctrine()->getRepository(HorsForfait::class);
        $lesHorsForfaits = $repository->findHForfaitByFiche($id_Fiche);

        $form = $this->createForm(ForfaitFormType::class,$id_Fiche);
        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid())
        {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            $this->redirectToRoute("menu");
        }
        return $this->render('fiche/modifFiche.html.twig',['form' => $form->createView(),'fiche' => $laFiche,'lesForfaits' => $lesHorsForfaits]);
    }
}
