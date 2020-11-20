<?php

namespace App\Controller;

use App\Entity\Fiche;
use App\Entity\Visiteur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ForfaitFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FicheController extends AbstractController
{
    /**
     * @Route("/menu/{id_Vis}/fiche/{id_Fiche}", name="fiche")
     */
    public function modifier($id_Vis,$id_Fiche,Request $request): Response
    {

        $repository = $this->getDoctrine()->getRepository(Visiteur::class);
        $leVisiteur = $repository->find($id_Vis);
        $repository = $this->getDoctrine()->getRepository(Fiche::class);
        $laFiche = $repository->find($id_Fiche);
        $repository = $this->getDoctrine()->getRepository(Forfait::class);
        $lesForfaits = $repository->findForfaitByFiche($idFiche);

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
        return $this->render('fiche/modifFiche.html.twig',['form' => $form->createView(),'visiteur' => $leVisiteur,'fiche' => $laFiche,'lesForfaits' => $lesForfaits]);
    }
}
