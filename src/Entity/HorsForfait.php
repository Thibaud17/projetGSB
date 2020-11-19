<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HorsForfait
 *
 * @ORM\Table(name="HORS_FORFAIT", indexes={@ORM\Index(name="FK_HORS_FORFAIT_FICHE", columns={"ID_FICHE"})})
 * @ORM\Entity(repositoryClass="App\Repository\HorsForfaitRepository")
 */

class HorsForfait
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_H_Forfait", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHForfait;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE", type="string", length=40, nullable=true)
     */
    private $libelle;

    /**
     * @var float|null
     *
     * @ORM\Column(name="MONTANT", type="float", precision=10, scale=0, nullable=true)
     */
    private $montant;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE", type="date", nullable=true)
     */
    private $date;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="estValide", type="boolean", nullable=true)
     */
    private $estvalide;

    /**
     * @var \Fiche
     *
     * @ORM\ManyToOne(targetEntity="Fiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FICHE", referencedColumnName="ID_FICHE")
     * })
     */
    private $idFiche;

    public function getIdHForfait(): ?int
    {
        return $this->idHForfait;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEstvalide(): ?bool
    {
        return $this->estvalide;
    }

    public function setEstvalide(?bool $estvalide): self
    {
        $this->estvalide = $estvalide;

        return $this;
    }

    public function getIdFiche(): ?Fiche
    {
        return $this->idFiche;
    }

    public function setIdFiche(?Fiche $idFiche): self
    {
        $this->idFiche = $idFiche;

        return $this;
    }


}
