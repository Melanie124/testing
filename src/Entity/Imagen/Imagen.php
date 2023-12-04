<?php

namespace App\Entity\Imagen;

use App\Repository\Imagen\ImagenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagenRepository::class)]
class Imagen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Archivo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArchivo(): ?string
    {
        return $this->Archivo;
    }

    public function setArchivo(string $Archivo): static
    {
        $this->Archivo = $Archivo;

        return $this;
    }
}
