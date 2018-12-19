<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mark;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $yearOfRelease;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="car")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mot", mappedBy="car")
     */
    private $mots;

    public function __construct()
    {
        $this->mots = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setMark(string $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYearOfRelease(): ?string
    {
        return $this->yearOfRelease;
    }

    public function setYearOfRelease(string $yearOfRelease): self
    {
        $this->yearOfRelease = $yearOfRelease;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Mot[]
     */
    public function getMots(): Collection
    {
        return $this->mots;
    }

    public function addMot(Mot $mot): self
    {
        if (!$this->mots->contains($mot)) {
            $this->mots[] = $mot;
            $mot->setCar($this);
        }

        return $this;
    }

    public function removeMot(Mot $mot): self
    {
        if ($this->mots->contains($mot)) {
            $this->mots->removeElement($mot);
            // set the owning side to null (unless already changed)
            if ($mot->getCar() === $this) {
                $mot->setCar(null);
            }
        }

        return $this;
    }

}
