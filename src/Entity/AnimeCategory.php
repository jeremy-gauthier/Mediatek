<?php

namespace App\Entity;

use App\Repository\AnimeCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeCategoryRepository::class)
 */
class AnimeCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $label;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

     /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity=Animation::class, inversedBy="categories")
     */
    private $animation;

    public function __construct()
    {
        $this->animation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|Animation[]
     */
    public function getAnimation(): Collection
    {
        return $this->animation;
    }

    public function addAnimation(Animation $animation): self
    {
        if (!$this->animation->contains($animation)) {
            $this->animation[] = $animation;
        }

        return $this;
    }

    public function removeAnimation(Animation $animation): self
    {
        if ($this->animation->contains($animation)) {
            $this->animation->removeElement($animation);
        }

        return $this;
    }

    public function addAnime(Animation $anime): self
    {
        if (!$this->animation->contains($anime)) {
            $this->animation[] = $anime;
        }

        return $this;
    }

    public function removeAnime(Animation $Anime): self
    {
        if ($this->animation->contains($anime)) {
            $this->animation->removeElement($anime);
        }

        return $this;
    }
}
