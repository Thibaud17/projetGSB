<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeFrais
 *
 * @ORM\Table(name="TYPE_FRAIS")
 * @ORM\Entity(repositoryClass="App\Repository\TypeFraisRepository")
 */
class TypeFrais
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_TYPE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE", type="string", length=40, nullable=true)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MONTANT", type="string", length=40, nullable=true)
     */
    private $montant;

    /*
    /**
     * @ORM\ManyToOne(targetEntity=Forfait::class, inversedBy="leType")
     * @ORM\JoinColumn(name="ID_FORFAIT", referencedColumnName="ID_FORFAIT", nullable=true)
     
    private $lesForfaits;
    */

    public function getIdType(): ?int
    {
        return $this->idType;
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

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }
    /*
    public function getLesForfaits(): ?Forfait
    {
        return $this->lesForfaits;
    }

    public function setLesForfaits(?Forfait $lesForfaits): self
    {
        $this->lesForfaits = $lesForfaits;

        return $this;
    }
    */

}
