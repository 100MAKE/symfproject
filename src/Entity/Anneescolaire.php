<?php

namespace App\Entity;

use App\Repository\AnneescolaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnneescolaireRepository::class)]
class Anneescolaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 200)]
    private $libelleannee;

    #[ORM\Column(type: 'string', length: 200)]
    private $etatannee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleannee(): ?string
    {
        return $this->libelleannee;
    }

    public function setLibelleannee(string $libelleannee): self
    {
        $this->libelleannee = $libelleannee;

        return $this;
    }

    public function getEtatannee(): ?string
    {
        return $this->etatannee;
    }

    public function setEtatannee(string $etatannee): self
    {
        $this->etatannee = $etatannee;

        return $this;
    }
}
