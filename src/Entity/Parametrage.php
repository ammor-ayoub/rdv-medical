<?php

namespace App\Entity;

use App\Config\AppointementType;
use App\Repository\ParametrageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParametrageRepository::class)]
class Parametrage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 30)]
    private string $nameApp;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(length: 10)]
    private string $phone;

    #[ORM\Column(enumType: AppointementType::class)]
    private ?AppointementType $typeAppointement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameApp(): ?string
    {
        return $this->nameApp;
    }

    public function setNameApp(string $nameApp): static
    {
        $this->nameApp = $nameApp;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getTypeAppointement(): ?AppointementType
    {
        return $this->typeAppointement;
    }

    public function setTypeAppointement(AppointementType $typeAppointement): static
    {
        $this->typeAppointement = $typeAppointement;

        return $this;
    }
}
