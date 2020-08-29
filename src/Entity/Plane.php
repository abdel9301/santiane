<?php

namespace App\Entity;

use App\Repository\PlaneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaneRepository::class)
 */
class Plane extends Transport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $gate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $baggage_drop;

    public function __toString(): string
    {
        return 'Plane';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getGate(): ?string
    {
        return $this->gate;
    }

    public function setGate(string $gate): self
    {
        $this->gate = $gate;

        return $this;
    }

    public function getBaggageDrop(): ?int
    {
        return $this->baggage_drop;
    }

    public function setBaggageDrop(?int $baggage_drop): self
    {
        $this->baggage_drop = $baggage_drop;

        return $this;
    }
}
