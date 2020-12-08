<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Fiche;
use App\Entity\Forfait;
use App\Entity\HorsForfait;
use App\Entity\Visiteur;
use App\Entity\TypeFrais;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ForfaitFormType;
use App\Form\FicheFormType;
use App\Form\TypeFraisFormType;
use App\Form\HorsForfaitFormType;
use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FicheController extends AbstractController
{
    /**
     * @Route("/fiche/{id}", name="creaFiche")
     */
    public function creation(Request $request,$id): Response
    {

        //Creation de la fiche affilier au visiteur connecté

        $repositoryFiche = $this->getDoctrine()->getRepository( Fiche::class);
        $lastFiche=$repositoryFiche->findLastFiche($id);
        $fiche= new Fiche();
        $fiche->setidFiche($lastFiche[0]->getidFiche()+1);

        


        //Instanciation des 4 forfaits types 

        $repositoryT = $this->getDoctrine()->getRepository(TypeFrais::class);
        $forfait1= new Forfait();
        $leType1 = $repositoryT->findunType(1);
        dump($leType1);
        $forfait1->setType($leType1[0]);

        $forfait2= new Forfait();
        $leType2 = $repositoryT->findunType(2);
        $forfait2->setType($leType2[0]);

        $forfait3= new Forfait();
        $leType3 = $repositoryT->findunType(3);
        $forfait3->setType($leType3[0]);

        $forfait4= new Forfait();
        $leType4 = $repositoryT->findunType(4);
        $forfait4->setType($leType4[0]);
        

        $fiche->addLesForfait($forfait1);
        $fiche->addLesForfait($forfait2);
        $fiche->addLesForfait($forfait3);
        $fiche->addLesForfait($forfait4);

        //Valeur fiche fixe

        date_default_timezone_set('Europe/Paris');
        $mois = new DateTime('now');

        $repositoryState = $this->getDoctrine()->getRepository(Etat::class);
        $state= new Etat();
        $state=$repositoryState->find($id);

        $repositoryVis = $this->getDoctrine()->getRepository(Visiteur::class);
        $visiteur = $repositoryVis->findunVis($id);

        $form = $this->createForm(FicheFormType::class,$fiche);
        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid())
        {
            $data = $form->getData();
            $data->setMois($mois);
            $data->setIdEtat($state);
            $data->setVisiteur($visiteur[0]);
            dump($data);
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();


            $this->redirectToRoute("menu");
        }
        return $this->render('fiche/creaFiche.html.twig',
        ['form' => $form->createView(),
        ]);
    }







    /**
     * @Route("/fiche/{id_Fiche}", name="modFiche")
     */
    public function modifier($id_Fiche,Request $request): Response
    {
        // On cherche la fiche

        $repositoryF = $this->getDoctrine()->getRepository(Fiche::class);
        $laFiche = $repositoryF->find($id_Fiche);

        // On cherche les frais forfaitaires

        $repositoryFo = $this->getDoctrine()->getRepository(Forfait::class);
        $lesForfaits = $repositoryFo->findForfaitByFiche($id_Fiche);
        


        // On cherche les frais hors forfaitaires



        $repositoryH = $this->getDoctrine()->getRepository(HorsForfait::class);
        $lesHorsForfaits = $repositoryH->findHForfaitByFiche($id_Fiche);

        
        // On cherche les type de frais

        $repositoryT = $this->getDoctrine()->getRepository(TypeFrais::class);
        $lesTypes = $repositoryT->findAll();

        // Formulaire des Forfaits

        $formF = $this->createForm(ForfaitFormType::class, ['forfaits' => $lesForfaits]);
        $formF->handleRequest($request);
        if ($formF->isSubmitted() and $formF->isValid())
        {
            $dataF = $formF->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($dataF);
            $em->flush();
            $this->redirectToRoute("menu");
        }


        // Formulaire des  Hors Forfaits

        
        $formH = $this->createForm(HorsForfaitFormType::class);
        $formH->handleRequest($request, $id_Fiche);
        if ($formH->isSubmitted() and $formH->isValid())
        {
            $dataH = $formH->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($dataH);
            $em->flush();
            $this->redirectToRoute("menu");
        }
        
        // Render

        return $this->render('fiche/modifFiche.html.twig',
        ['formF' => $formF->createView(),
        'formH' => $formH->createView(),
        'fiche' => $laFiche,
        'lesHorsForfait' => $lesHorsForfaits ,
        'lesForfaits' => $lesForfaits,
        'types' => $lesTypes,
        ]);
    }
}
