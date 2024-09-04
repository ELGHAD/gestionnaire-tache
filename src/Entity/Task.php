<?php
// src/Entity/Task.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'task')]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $dueDate;

    #[ORM\Column(type: 'string')]
    private string $status;

    #[ORM\Column(type: 'string')]
    private string $priority;

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'tasks')]
    #[ORM\JoinColumn(nullable: false)]
    private Project $project;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'tasks')]
    private ?User $user = null;

    // Getters et Setters...

    public function getIdTask(): ?int
    {
        return $this->idTask;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDueDate(): \DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTimeInterface $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getPriority(): string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): void
    {
        $this->priority = $priority;
    }

    public function getProject(): Project
    {
        return $this->project;
    }

    public function setProject(Project $project): void
    {
        $this->project = $project;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): void
    {
        $this->user = $user;
    }
}
