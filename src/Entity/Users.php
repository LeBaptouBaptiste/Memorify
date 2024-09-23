<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column]
    private ?int $tentatives = null;

    #[ORM\Column]
    private ?bool $lock = null;

    /**
     * @var Collection<int, Sorties>
     */
    #[ORM\ManyToMany(targetEntity: Sorties::class, inversedBy: 'users')]
    private Collection $sortie;

    public function __construct()
    {
        $this->sortie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getTentatives(): ?int
    {
        return $this->tentatives;
    }

    public function setTentatives(int $tentatives): static
    {
        $this->tentatives = $tentatives;

        return $this;
    }

    public function isLock(): ?bool
    {
        return $this->lock;
    }

    public function setLock(bool $lock): static
    {
        $this->lock = $lock;

        return $this;
    }

    /**
     * @return Collection<int, Sorties>
     */
    public function getSortie(): Collection
    {
        return $this->sortie;
    }

    public function addSortie(Sorties $sortie): static
    {
        if (!$this->sortie->contains($sortie)) {
            $this->sortie->add($sortie);
        }

        return $this;
    }

    public function removeSortie(Sorties $sortie): static
    {
        $this->sortie->removeElement($sortie);

        return $this;
    }
}
