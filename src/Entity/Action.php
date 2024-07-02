<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActionRepository::class)
 */
class Action
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeSource;

    /**
     * @ORM\ManyToOne(targetEntity=Onglet::class, inversedBy="actions")
     */
    private $onglet;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCodeSource(): ?string
    {
        return $this->codeSource;
    }

    public function setCodeSource(string $codeSource): self
    {
        $this->codeSource = $codeSource;

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


}
