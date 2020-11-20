<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Visiteur;
use App\Entity\Etat;

/**
 * Fiche
 *
 * @ORM\Table(name="FICHE", indexes={@ORM\Index(name="FK_FICHE_ETAT", columns={"ID_ETAT"}), @ORM\Index(name="FK_FICHE_VISITEUR", columns={"ID_VISIT"})})
 * @ORM\Entity(repositoryClass="App\Repository\FicheRepository")
 */
class Fiche
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_FICHE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFiche;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="MOIS", type="date", nullable=false)
     */
    private $mois;

    /**
     * @var \Etat
     *
     * @ORM\ManyToOne(targetEntity="Etat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ETAT", referencedColumnName="ID_ETAT")
     * })
     */
    private $idEtat;

 /**
     * @ORM\ManyToOne(targetEntity=Visiteur::class, inversedBy="fiches")
     * @ORM\JoinColumn(name="ID_VISIT", referencedColumnName="ID_VISIT")
     */
    private $visiteur;
    
    public function getIdFiche(): ?int
    {
        return $this->idFiche;
    }

    public function getMois(): ?\DateTimeInterface
    {
        return $this->mois;
    }

    public function setMois(\DateTimeInterface $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getIdEtat(): ?Etat
    {
        return $this->idEtat;
    }

    public function setIdEtat(?Etat $idEtat): self
    {
        $this->idEtat = $idEtat;

        return $this;
    }

    public function getIdVisit(): ?Visiteur
    {
        return $this->idVisit;
    }

    public function setIdVisit(?Visiteur $idVisit): self
    {
        $this->idVisit = $idVisit;

        return $this;
    }

    public function getVisiteur()
    {
        return $this->visiteur;
    }

    public function setVisiteur($visiteur): self
    {
        $this->visiteur = $visiteur;

        return $this;
    }
}
