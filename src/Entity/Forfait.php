<?php

namespace App\Entity;

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
     * @var \TypeFrais
     *
     * @ORM\ManyToOne(targetEntity="TypeFrais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TYPE", referencedColumnName="ID_TYPE")
     * })
     */
    private $idType;

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

    public function getIdType(): ?TypeFrais
    {
        return $this->idType;
    }

    public function setIdType(?TypeFrais $idType): self
    {
        $this->idType = $idType;

        return $this;
    }


}
