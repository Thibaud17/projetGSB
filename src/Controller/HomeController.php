<?php

namespace App\Controller;

use App\Entity\Visiteur;
use App\Entity\Fiche;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="connexion")
     */
    public function connexion(): Response
    {
        return $this->render('home/connection.html.twig');
    }

    /**
     * @Route("/menu/{id}", name="menu")
     */
    public function menu($id): Response
    {
        // On cherche le visiteur
        $repositoryVis = $this->getDoctrine()->getRepository(Visiteur::class);
        $visiteur = $repositoryVis->find($id);

        //Appel de la fonction pour trouver le mois en cours en Francais
        $mois=$this->getNameMonth();

        //Collection de fiches du visiteur
        $fiches = $visiteur->getFiches();

        //
        $repositoryFiche = $this->getDoctrine()->getRepository( Fiche::class);
        $laFiche=$repositoryFiche->findLastFiche($id);

        return $this->render('home/menu.html.twig', ['lesFiches' => $fiches,'mois' => $mois,'laFiche' => $laFiche]);
    }

    /**
     * @Route("/menuJSON/{id}", name="menuJSON")
     */
    public function menuJSON($id): JsonResponse
    {
        // On cherche le visiteur
        $repositoryVis = $this->getDoctrine()->getRepository(Visiteur::class);
        $visiteur = $repositoryVis->find($id);

        //Collection de fiches du visiteur
        $fiches = $visiteur->getFiches();
        $data = [];

        foreach ($fiches as $uneFiche ) {
            dump($uneFiche);
            $data[] = [
                
                'id' => $uneFiche ->getIdFiche(),
                'mois' => $uneFiche ->getMois(),
                'idEtat' => $uneFiche ->getIdEtat()->getIdEtat(),
                'idVisit' => $uneFiche ->getVisiteur()->getIdVisit()
            ];
        }

       return new JsonResponse($data, Response::HTTP_OK);
    }






















    public function getNameMonth()
    {
        $name="Janvier";
        $i=date("m");
        switch ($i) 
        {
            case "01":
                break;
            case "02":
                $name="Février";
                break;
            case "03":
                $name="Mars";
                break;
            case "04":
                $name="Avril";
                break;
            case "05":
                $name="Mai";
            break;
            case "06":
                $name="Juin";
            break;
            case "07":
                $name="Juillet";
            break;
            case "08":
                $name="Août";
            break;
            case "09":
                $name="Septembre";
            break;
            case "10":
                $name="Octobre";
            break;
            case "11":
                $name="Novembre";
            break;
            case "12":
                $name="Décembre";
            break;
        }
        return $name;
    }
}
