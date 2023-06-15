<?php

namespace App\Entity;

use App\Repository\MusicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusicRepository::class)]
class Music
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title_music = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt_music = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $length = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_music = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $details = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $producers = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $writers_composers = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $studios = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $likes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName_music = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt_music = null;

    #[ORM\Column(length: 255)]
    private ?string $audioName_music = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug_music = null;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'music')]
    private Collection $category;

    #[ORM\ManyToMany(targetEntity: Playlist::class, mappedBy: 'music')]
    private Collection $playlists;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->playlists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleMusic(): ?string
    {
        return $this->title_music;
    }

    public function setTitleMusic(string $title_music): static
    {
        $this->title_music = $title_music;

        return $this;
    }

    public function getCreatedAtMusic(): ?\DateTimeImmutable
    {
        return $this->createdAt_music;
    }

    public function setCreatedAtMusic(\DateTimeImmutable $createdAt_music): static
    {
        $this->createdAt_music = $createdAt_music;

        return $this;
    }

    public function getLength(): ?\DateTimeInterface
    {
        return $this->length;
    }

    public function setLength(\DateTimeInterface $length): static
    {
        $this->length = $length;

        return $this;
    }

    public function getDescriptionMusic(): ?string
    {
        return $this->description_music;
    }

    public function setDescriptionMusic(?string $description_music): static
    {
        $this->description_music = $description_music;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): static
    {
        $this->details = $details;

        return $this;
    }

    public function getProducers(): ?string
    {
        return $this->producers;
    }

    public function setProducers(?string $producers): static
    {
        $this->producers = $producers;

        return $this;
    }

    public function getWritersComposers(): ?string
    {
        return $this->writers_composers;
    }

    public function setWritersComposers(?string $writers_composers): static
    {
        $this->writers_composers = $writers_composers;

        return $this;
    }

    public function getStudios(): ?string
    {
        return $this->studios;
    }

    public function setStudios(?string $studios): static
    {
        $this->studios = $studios;

        return $this;
    }

    public function getLikes(): ?string
    {
        return $this->likes;
    }

    public function setLikes(?string $likes): static
    {
        $this->likes = $likes;

        return $this;
    }

    public function getImageNameMusic(): ?string
    {
        return $this->imageName_music;
    }

    public function setImageNameMusic(?string $imageName_music): static
    {
        $this->imageName_music = $imageName_music;

        return $this;
    }

    public function getUpdatedAtMusic(): ?\DateTimeImmutable
    {
        return $this->updatedAt_music;
    }

    public function setUpdatedAtMusic(?\DateTimeImmutable $updatedAt_music): static
    {
        $this->updatedAt_music = $updatedAt_music;

        return $this;
    }

    public function getAudioNameMusic(): ?string
    {
        return $this->audioName_music;
    }

    public function setAudioNameMusic(string $audioName_music): static
    {
        $this->audioName_music = $audioName_music;

        return $this;
    }

    public function getSlugMusic(): ?string
    {
        return $this->slug_music;
    }

    public function setSlugMusic(?string $slug_music): static
    {
        $this->slug_music = $slug_music;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        $this->category->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, Playlist>
     */
    public function getPlaylists(): Collection
    {
        return $this->playlists;
    }

    public function addPlaylist(Playlist $playlist): static
    {
        if (!$this->playlists->contains($playlist)) {
            $this->playlists->add($playlist);
            $playlist->addMusic($this);
        }

        return $this;
    }

    public function removePlaylist(Playlist $playlist): static
    {
        if ($this->playlists->removeElement($playlist)) {
            $playlist->removeMusic($this);
        }

        return $this;
    }
}
