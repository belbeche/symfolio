<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagsRepository::class)
 */
class Tags
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tagname;

    /**
     * @ORM\ManyToMany(targetEntity=ProjectsTags::class, mappedBy="project_id")
     */
    private $projectsTags;

    public function __construct()
    {
        $this->projectsTags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTagname(): ?string
    {
        return $this->tagname;
    }

    public function setTagname(?string $tagname): self
    {
        $this->tagname = $tagname;

        return $this;
    }

    /**
     * @return Collection|ProjectsTags[]
     */
    public function getProjectsTags(): Collection
    {
        return $this->projectsTags;
    }

    public function addProjectsTag(ProjectsTags $projectsTag): self
    {
        if (!$this->projectsTags->contains($projectsTag)) {
            $this->projectsTags[] = $projectsTag;
            $projectsTag->addProjectId($this);
        }

        return $this;
    }

    public function removeProjectsTag(ProjectsTags $projectsTag): self
    {
        if ($this->projectsTags->removeElement($projectsTag)) {
            $projectsTag->removeProjectId($this);
        }

        return $this;
    }
}
