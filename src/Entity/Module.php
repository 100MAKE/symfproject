<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 200)]
    private $libellemodule;

 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellemodule(): ?string
    {
        return $this->libellemodule;
    }

    public function setLibellemodule(string $libellemodule): self
    {
        $this->libellemodule = $libellemodule;

        return $this;
    }

   
}
