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
     * @ORM\ManyToOne(targetEntity=Fiche::class, inversedBy="lesForfaits",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $laFiche;
    

    /**
     * @ORM\ManyToOne(targetEntity=TypeFrais::class, inversedBy="lesFraisForfaits",cascade={"persist"})
     * @ORM\JoinColumn(name="ID_TYPE", referencedColumnName="ID_TYPE")
     */
    private $type;

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
 
    
    public function getType(): ?TypeFrais
    {
        return $this->type;
    }

    public function setType(?TypeFrais $type): self
    {
        $this->type = $type;

        return $this;
    }
}
