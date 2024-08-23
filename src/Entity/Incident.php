<?php

namespace App\Entity;

use App\Repository\IncidentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IncidentRepository::class)
 */
class Incident
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $identifiant;

    /**
     * @ORM\ManyToOne(targetEntity=Onglet::class, inversedBy="incidents")
     */
    private $onglet;

    /**
     * @ORM\Column(type="text")
     */
    private $Solution;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
    /**
     * @ORM\Column(type="boolean")
     */
    private $resolu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(string $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getOnglet(): ?Onglet
    {
        return $this->onglet;
    }

    public function setOnglet(?Onglet $onglet): self
    {
        $this->onglet = $onglet;

        return $this;
    }

    public function getSolution(): ?string
    {
        return $this->Solution;
    }

    public function setSolution(string $Solution): self
    {
        $this->Solution = $Solution;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function isResolu(): ?bool
    {
        return $this->resolu;
    }

    public function setResolu(bool $resolu): self
    {
        $this->resolu = $resolu;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
