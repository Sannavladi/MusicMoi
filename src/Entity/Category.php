<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName_category = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt_category = null;

    #[ORM\Column(length: 255)]
    private ?string $slug_category = null;

    #[ORM\ManyToMany(targetEntity: Music::class, mappedBy: 'category')]
    private Collection $music;

    public function __construct()
    {
        $this->music = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getImageNameCategory(): ?string
    {
        return $this->imageName_category;
    }

    public function setImageNameCategory(?string $imageName_category): static
    {
        $this->imageName_category = $imageName_category;

        return $this;
    }

    public function getUpdatedAtCategory(): ?\DateTimeImmutable
    {
        return $this->updatedAt_category;
    }

    public function setUpdatedAtCategory(\DateTimeImmutable $updatedAt_category): static
    {
        $this->updatedAt_category = $updatedAt_category;

        return $this;
    }

    public function getSlugCategory(): ?string
    {
        return $this->slug_category;
    }

    public function setSlugCategory(string $slug_category): static
    {
        $this->slug_category = $slug_category;

        return $this;
    }

    /**
     * @return Collection<int, Music>
     */
    public function getMusic(): Collection
    {
        return $this->music;
    }

    public function addMusic(Music $music): static
    {
        if (!$this->music->contains($music)) {
            $this->music->add($music);
            $music->addCategory($this);
        }

        return $this;
    }

    public function removeMusic(Music $music): static
    {
        if ($this->music->removeElement($music)) {
            $music->removeCategory($this);
        }

        return $this;
    }
}
