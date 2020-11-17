<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etat
 *
 * @ORM\Table(name="ETAT")
 * @ORM\Entity
 */
class Etat
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_ETAT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEtat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE", type="string", length=40, nullable=true)
     */
    private $libelle;

    public function getIdEtat(): ?int
    {
        return $this->idEtat;
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


}
