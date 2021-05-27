<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $completion_period;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $visibility;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $github_link;

    /**
     * @ORM\ManyToOne(targetEntity=ProjectsScreenshots::class, inversedBy="project_id")
     */
    private $projectsScreenshots;

    /**
     * @ORM\ManyToMany(targetEntity=ProjectsTags::class, mappedBy="tag_id")
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCompletionPeriod(): ?string
    {
        return $this->completion_period;
    }

    public function setCompletionPeriod(string $completion_period): self
    {
        $this->completion_period = $completion_period;

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

    public function getVisibility(): ?bool
    {
        return $this->visibility;
    }

    public function setVisibility(?bool $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getGithubLink(): ?string
    {
        return $this->github_link;
    }

    public function setGithubLink(?string $github_link): self
    {
        $this->github_link = $github_link;

        return $this;
    }

    public function getProjectsScreenshots(): ?ProjectsScreenshots
    {
        return $this->projectsScreenshots;
    }

    public function setProjectsScreenshots(?ProjectsScreenshots $projectsScreenshots): self
    {
        $this->projectsScreenshots = $projectsScreenshots;

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
            $projectsTag->addTagId($this);
        }

        return $this;
    }

    public function removeProjectsTag(ProjectsTags $projectsTag): self
    {
        if ($this->projectsTags->removeElement($projectsTag)) {
            $projectsTag->removeTagId($this);
        }

        return $this;
    }
}
