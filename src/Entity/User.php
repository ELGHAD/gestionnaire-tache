<?php

// src/Entity/User.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class User extends Utilisateur
{
    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Task::class)]
    private Collection $tasks;

    public function __construct()
    {
        parent::__construct();
        $this->tasks = new ArrayCollection();
    }

    // Méthodes spécifiques à l'Utilisateur...

    public function updateTaskStatus()
    {

    }

    public function viewTaskDetails()
    {

    }
}
