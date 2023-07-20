<?php

namespace App\Entity;

use App\Repository\BillingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: BillingRepository::class)]
class Billing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $amount = null;

//Ajout de ma clé étrangère : l'id de la table contract
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?contract $contract_id = null;    
 
    

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContractId(): ?contract
    {
        return $this->contract_id;
    }

    public function setContractId(?contract $contract_id): static
    {
        $this->contract_id = $contract_id;

        return $this;
    }
}
