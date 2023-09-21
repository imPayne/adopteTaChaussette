<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $car_registration_code = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $kilometer = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    #[ORM\OneToOne(inversedBy: 'car', cascade: ['persist', 'remove'])]
    private ?CarRegistration $CarRegistration = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarRegistrationCode(): ?string
    {
        return $this->car_registration_code;
    }

    public function setCarRegistrationCode(string $car_registration_code): static
    {
        $this->car_registration_code = $car_registration_code;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getKilometer(): ?int
    {
        return $this->kilometer;
    }

    public function setKilometer(int $kilometer): static
    {
        $this->kilometer = $kilometer;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getCarRegistration(): ?CarRegistration
    {
        return $this->CarRegistration;
    }

    public function setCarRegistration(?CarRegistration $CarRegistration): static
    {
        $this->CarRegistration = $CarRegistration;

        return $this;
    }
}
