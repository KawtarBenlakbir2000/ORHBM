<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 */
class Module
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;



    /**
     * @ORM\OneToMany(targetEntity=Onglet::class, mappedBy="module")
     */
    private $onglet;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Module")
     */
    private $dependentModule;



    public function getDependentModule(): ?Module
    {
        return $this->dependentModule;
    }

    public function setDependentModule(?Module $dependentModule): self
    {
        $this->dependentModule = $dependentModule;

        return $this;
    }
    public function __construct()
    {

        $this->onglet = new ArrayCollection();

    }
    public function __toString(): string
   {
        return $this->Nom;
   }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

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


    /**
     * @return Collection<int, Onglet>
     */
    public function getOnglet(): Collection
    {
        return $this->onglet;
    }

    public function addOnglet(Onglet $onglet): self
    {
        if (!$this->onglet->contains($onglet)) {
            $this->onglet[] = $onglet;
            $onglet->setModule($this);
        }

        return $this;
    }

    public function removeOnglet(Onglet $onglet): self
    {
        if ($this->onglet->removeElement($onglet)) {
            // set the owning side to null (unless already changed)
            if ($onglet->getModule() === $this) {
                $onglet->setModule(null);
            }
        }

        return $this;
    }





}
