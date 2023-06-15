<?php

namespace App\Entity;

use App\Repository\PlaylistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistRepository::class)]
class Playlist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title_playlist = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_playlist = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName_playlist = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt_playlist = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug_playlist = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updateAt_playlist = null;

    #[ORM\ManyToMany(targetEntity: Music::class, inversedBy: 'playlists')]
    private Collection $music;

    #[ORM\ManyToOne(inversedBy: 'playlist')]
    private ?User $user = null;

    public function __construct()
    {
        $this->music = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitlePlaylist(): ?string
    {
        return $this->title_playlist;
    }

    public function setTitlePlaylist(string $title_playlist): static
    {
        $this->title_playlist = $title_playlist;

        return $this;
    }

    public function getDescriptionPlaylist(): ?string
    {
        return $this->description_playlist;
    }

    public function setDescriptionPlaylist(?string $description_playlist): static
    {
        $this->description_playlist = $description_playlist;

        return $this;
    }

    public function getImageNamePlaylist(): ?string
    {
        return $this->imageName_playlist;
    }

    public function setImageNamePlaylist(?string $imageName_playlist): static
    {
        $this->imageName_playlist = $imageName_playlist;

        return $this;
    }

    public function getCreatedAtPlaylist(): ?\DateTimeImmutable
    {
        return $this->createdAt_playlist;
    }

    public function setCreatedAtPlaylist(\DateTimeImmutable $createdAt_playlist): static
    {
        $this->createdAt_playlist = $createdAt_playlist;

        return $this;
    }

    public function getSlugPlaylist(): ?string
    {
        return $this->slug_playlist;
    }

    public function setSlugPlaylist(?string $slug_playlist): static
    {
        $this->slug_playlist = $slug_playlist;

        return $this;
    }

    public function getUpdateAtPlaylist(): ?\DateTimeImmutable
    {
        return $this->updateAt_playlist;
    }

    public function setUpdateAtPlaylist(?\DateTimeImmutable $updateAt_playlist): static
    {
        $this->updateAt_playlist = $updateAt_playlist;

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
        }

        return $this;
    }

    public function removeMusic(Music $music): static
    {
        $this->music->removeElement($music);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
