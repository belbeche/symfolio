<?php

namespace App\Entity;

use App\Repository\ProjectsTagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectsTagsRepository::class)
 */
class ProjectsTags
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Tags::class, inversedBy="projectsTags")
     */
    private $project_id;

    /**
     * @ORM\ManyToMany(targetEntity=Project::class, inversedBy="projectsTags")
     */
    private $tag_id;

    public function __construct()
    {
        $this->project_id = new ArrayCollection();
        $this->tag_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|tags[]
     */
    public function getProjectId(): Collection
    {
        return $this->project_id;
    }

    public function addProjectId(tags $projectId): self
    {
        if (!$this->project_id->contains($projectId)) {
            $this->project_id[] = $projectId;
        }

        return $this;
    }

    public function removeProjectId(tags $projectId): self
    {
        $this->project_id->removeElement($projectId);

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getTagId(): Collection
    {
        return $this->tag_id;
    }

    public function addTagId(Project $tagId): self
    {
        if (!$this->tag_id->contains($tagId)) {
            $this->tag_id[] = $tagId;
        }

        return $this;
    }

    public function removeTagId(Project $tagId): self
    {
        $this->tag_id->removeElement($tagId);

        return $this;
    }
}
