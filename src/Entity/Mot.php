<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MotRepository")
 */
class Mot
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Car", inversedBy="mots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $car;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateOfControl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }

    public function getDateOfControl(): ?\DateTimeInterface
    {
        return $this->dateOfControl;
    }

    public function setDateOfControl(\DateTimeInterface $dateOfControl): self
    {
        $this->dateOfControl = $dateOfControl;

        return $this;
    }
}
