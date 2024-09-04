<?php
// src/Entity/Admin.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Admin extends Utilisateur
{
    // Méthodes spécifiques à l'Admin...

    public function createUser()
    {
        // Logic to create a user
    }

    public function editUser()
    {
        // Logic to edit a user
    }

    public function deleteUser()
    {
        // Logic to delete a user
    }

    public function assignRole()
    {
        // Logic to assign a role
    }

    public function createProject()
    {
        // Logic to create a project
    }

    public function editProject()
    {
        // Logic to edit a project
    }

    public function deleteProject()
    {
        // Logic to delete a project
    }

    public function assignProject()
    {
        // Logic to assign a project
    }
}
