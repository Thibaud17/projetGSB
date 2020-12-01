<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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


    /**
     * @ORM\OneToMany(targetEntity=Forfait::class, mappedBy="type",cascade={"persist"})
     */
    private $lesFraisForfaits;

    public function __construct()
    {
        $this->lesFraisForfaits = new ArrayCollection();
    }
    

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


    /**
     * @return Collection|Forfait[]
     */
    public function getLesFraisForfaits(): Collection
    {
        return $this->lesFraisForfaits;
    }

    public function addLesFraisForfait(Forfait $lesFraisForfait): self
    {
        if (!$this->lesFraisForfaits->contains($lesFraisForfait)) {
            $this->lesFraisForfaits[] = $lesFraisForfait;
            $lesFraisForfait->setType($this);
        }

        return $this;
    }

    public function removeLesFraisForfait(Forfait $lesFraisForfait): self
    {
        if ($this->lesFraisForfaits->removeElement($lesFraisForfait)) {
            // set the owning side to null (unless already changed)
            if ($lesFraisForfait->getType() === $this) {
                $lesFraisForfait->setType(null);
            }
        }

        return $this;
    }
}
