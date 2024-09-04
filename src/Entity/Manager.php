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



    public function manageProject()
    {

    }

    public function createTask()
    {

    }

    public function editTask()
    {

    }

    public function deleteTask()
    {

    }

    public function assignTask()
    {

    }
}
