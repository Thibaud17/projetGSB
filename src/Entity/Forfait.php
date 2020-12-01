<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Forfait
 *
 * @ORM\Table(name="FORFAIT", indexes={@ORM\Index(name="FK_FORFAIT_TYPE_FRAIS", columns={"ID_TYPE"}), @ORM\Index(name="FK_FORFAIT_FICHE", columns={"ID_FICHE"})})
 * @ORM\Entity(repositoryClass="App\Repository\ForfaitRepository")
 */
class Forfait
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_FORFAIT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idForfait;

    /**
     * @var int|null
     *
     * @ORM\Column(name="QTE", type="integer", nullable=true)
     */
    private $qte;

    /**
     * @var \Fiche
     *
     * @ORM\ManyToOne(targetEntity="Fiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FICHE", referencedColumnName="ID_FICHE")
     * })
     */
    private $idFiche;


    /**
     * @ORM\ManyToOne(targetEntity=Fiche::class, inversedBy="lesForfaits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $laFiche;

    /**
     * @ORM\OneToMany(targetEntity=TypeFrais::class, mappedBy="lesForfaits")
     */
    private $leType;

    public function __construct()
    {
        $this->leType = new ArrayCollection();
    }

    public function getIdForfait(): ?int
    {
        return $this->idForfait;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(?int $qte): self
    {
        $this->qte = $qte;

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

    public function getLaFiche(): ?Fiche
    {
        return $this->laFiche;
    }

    public function setLaFiche(?Fiche $laFiche): self
    {
        $this->laFiche = $laFiche;

        return $this;
    }

    /**
     * @return Collection|TypeFrais[]
     */
    public function getLeType(): Collection
    {
        return $this->leType;
    }

    public function addLeType(TypeFrais $leType): self
    {
        if (!$this->leType->contains($leType)) {
            $this->leType[] = $leType;
            $leType->setLesForfaits($this);
        }

        return $this;
    }

    public function removeLeType(TypeFrais $leType): self
    {
        if ($this->leType->removeElement($leType)) {
            // set the owning side to null (unless already changed)
            if ($leType->getLesForfaits() === $this) {
                $leType->setLesForfaits(null);
            }
        }

        return $this;
    }


}
