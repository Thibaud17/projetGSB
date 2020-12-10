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

    /**
     * @ORM\OneToMany(targetEntity=Forfait::class, mappedBy="laFiche",cascade={"persist"})
     */
    private $lesForfaits;

    /**
     * @ORM\OneToMany(targetEntity=HorsForfait::class, mappedBy="laFiche",cascade={"persist"})
     */
    private $lesHorsForfaits;

    public function __construct()
    {
        $this->lesForfaits = new ArrayCollection();
        $this->lesHorsForfaits = new ArrayCollection();
    }
    
    public function getIdFiche(): ?int
    {
        return $this->idFiche;
    }

    public function setIdFiche($idFiche): self
    {
        $this->idFiche = $idFiche;
        return $this;
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

    public function getVisiteur()
    {
        return $this->visiteur;
    }

    public function setVisiteur($visiteur): self
    {
        $this->visiteur = $visiteur;
        
        return $this;
    }

    /**
     * @return Collection|Forfait[]
     */
    public function getLesForfaits(): Collection
    {
        return $this->lesForfaits;
    }

    public function addLesForfait(Forfait $lesForfait): self
    {
        if (!$this->lesForfaits->contains($lesForfait)) {
            $this->lesForfaits[] = $lesForfait;
            $lesForfait->setLaFiche($this);
        }

        return $this;
    }

    public function removeLesForfait(Forfait $lesForfait): self
    {
        if ($this->lesForfaits->removeElement($lesForfait)) {
            // set the owning side to null (unless already changed)
            if ($lesForfait->getLaFiche() === $this) {
                $lesForfait->setLaFiche(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HorsForfait[]
     */
    public function getLesHorsForfaits(): Collection
    {
        return $this->lesHorsForfaits;
    }

    public function addLesHorsForfait(HorsForfait $lesHorsForfait): self
    {
        if (!$this->lesHorsForfaits->contains($lesHorsForfait)) {
            $this->lesHorsForfaits[] = $lesHorsForfait;
            $lesHorsForfait->setLaFiche($this);
        }

        return $this;
    }

    public function removeLesHorsForfait(HorsForfait $lesHorsForfait): self
    {
        if ($this->lesHorsForfaits->removeElement($lesHorsForfait)) {
            // set the owning side to null (unless already changed)
            if ($lesHorsForfait->getLaFiche() === $this) {
                $lesHorsForfait->setLaFiche(null);
            }
        }

        return $this;
    }
}
