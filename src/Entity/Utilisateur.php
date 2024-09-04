<?php
// src/Entity/Utilisateur.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'utilisateur')]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(['admin' => Admin::class, 'manager' => Manager::class, 'user' => User::class])]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id ;

    #[ORM\Column(type: 'string', length: 255)]
    private string $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    private string $lastName;

    #[ORM\Column(type: 'string', unique: true)]
    private string $email;

    #[ORM\Column(type: 'string')]
    private string $password;

    #[ORM\Column(type: 'string')]
    private string $role;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Notification::class)]
    private Collection $notifications;

    public function __construct()
    {
        $this->notifications = new ArrayCollection();
    }

    // Getters et Setters...

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getNotifications(): Collection
    {
        return $this->notifications;
    }
}
