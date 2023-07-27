<?php

namespace App\Entity;

use App\Repository\ContractRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


//Création de l'entité Contract avec ses champs
#[ORM\Entity(repositoryClass: ContractRepository::class)]
class Contract
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $vehicle_uid = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_uid = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $sign_datetime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $loc_begin_datetime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $loc_end_datetime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $returning_datetime = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleUid(): ?string
    {
        return $this->vehicle_uid;
    }

    public function setVehicleUid(string $vehicle_uid): static
    {
        $this->vehicle_uid = $vehicle_uid;

        return $this;
    }

    public function getCustomerUid(): ?string
    {
        return $this->customer_uid;
    }

    public function setCustomerUid(string $customer_uid): static
    {
        $this->customer_uid = $customer_uid;

        return $this;
    }

    public function getSignDatetime(): ?\DateTimeInterface
    {
        return $this->sign_datetime;
    }

    public function setSignDatetime(\DateTimeInterface $sign_datetime): static
    {
        $this->sign_datetime = $sign_datetime;

        return $this;
    }

    public function getLocBeginDatetime(): ?\DateTimeInterface
    {
        return $this->loc_begin_datetime;
    }

    public function setLocBeginDatetime(\DateTimeInterface $loc_begin_datetime): static
    {
        $this->loc_begin_datetime = $loc_begin_datetime;

        return $this;
    }

    public function getLocEndDatetime(): ?\DateTimeInterface
    {
        return $this->loc_end_datetime;
    }

    public function setLocEndDatetime(\DateTimeInterface $loc_end_datetime): static
    {
        $this->loc_end_datetime = $loc_end_datetime;

        return $this;
    }

    public function getReturningDatetime(): ?\DateTimeInterface
    {
        return $this->returning_datetime;
    }

    public function setReturningDatetime(\DateTimeInterface $returning_datetime): static
    {
        $this->returning_datetime = $returning_datetime;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }
}
