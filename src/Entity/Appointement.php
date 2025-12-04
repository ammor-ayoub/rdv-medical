<?php

namespace App\Entity;

use App\Repository\AppointementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointementRepository::class)]
class Appointement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Doctor $doctor;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Patient $patient;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $startTime = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $endTime = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $numbreAppointment = null;

    #[ORM\Column(length: 10)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDoctor(): Doctor
    {
        return $this->doctor;
    }

    public function setDoctor(Doctor $doctor): static
    {
        $this->doctor = $doctor;

        return $this;
    }

    public function getPatient(): Patient
    {
        return $this->patient;
    }

    public function setPatient(Patient $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getStartTime(): ?\DateTime
    {
        return $this->startTime;
    }

    public function setStartTime(?\DateTime $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTime
    {
        return $this->endTime;
    }

    public function setEndTime(?\DateTime $endTime): static
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getNumbreAppointment(): ?int
    {
        return $this->numbreAppointment;
    }

    public function setNumbreAppointment(?int $numbreAppointment): static
    {
        $this->numbreAppointment = $numbreAppointment;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
