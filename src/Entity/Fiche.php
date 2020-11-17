<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fiche
 *
 * @ORM\Table(name="FICHE", indexes={@ORM\Index(name="FK_FICHE_ETAT", columns={"ID_ETAT"}), @ORM\Index(name="FK_FICHE_VISITEUR", columns={"ID_VISIT"})})
 * @ORM\Entity
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
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_VISIT", referencedColumnName="ID_VISIT")
     * })
     */
    private $idVisit;

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


}
