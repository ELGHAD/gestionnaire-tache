<?php
// src/Entity/Manager.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Manager extends Utilisateur
{
    #[ORM\OneToMany(mappedBy: 'manager', targetEntity: Project::class)]
    private Collection $projects;

    #[ORM\OneToMany(mappedBy: 'manager', targetEntity: Task::class)]
    private Collection $tasks;

    public function __construct()
    {
        parent::__construct();
        $this->projects = new ArrayCollection();
        $this->tasks = new ArrayCollection();
    }

    // Méthodes spécifiques au Manager...

    public function manageProject()
    {
        // Logic to manage project
    }

    public function createTask()
    {
        // Logic to create task
    }

    public function editTask()
    {
        // Logic to edit task
    }

    public function deleteTask()
    {
        // Logic to delete task
    }

    public function assignTask()
    {
        // Logic to assign task
    }
}
