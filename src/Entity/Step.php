<?php

namespace App\Entity;

use App\Repository\StepRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StepRepository::class)
 */
class Step
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Transport::class, inversedBy="steps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transport;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $departure;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrival;

    /**
     * @ORM\ManyToOne(targetEntity=Trip::class, inversedBy="steps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trip;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransport(): ?Transport
    {
        return $this->transport;
    }

    public function setTransport(?Transport $transport): self
    {
        $this->transport = $transport;

        return $this;
    }

    public function getDeparture(): ?Place
    {
        return $this->departure;
    }

    public function setDeparture(?Place $departure): self
    {
        $this->departure = $departure;

        return $this;
    }

    public function getArrival(): ?Place
    {
        return $this->arrival;
    }

    public function setArrival(?Place $arrival): self
    {
        $this->arrival = $arrival;

        return $this;
    }

    public function getTrip(): ?Trip
    {
        return $this->trip;
    }

    public function setTrip(?Trip $trip): self
    {
        $this->trip = $trip;

        return $this;
    }
}
