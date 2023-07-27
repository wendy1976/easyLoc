<?php

namespace App\Entity;

use App\Repository\BillingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

//Création de l'entité Billing avec les champs
#[ORM\Entity(repositoryClass: BillingRepository::class)]
class Billing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $contract_id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $amount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContractId(): ?int
    {
        return $this->contract_id;
    }

    public function setContractId(int $contract_id): static
    {
        $this->contract_id = $contract_id;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): static
    {
        $this->amount = $amount;

        return $this;
    }
}
