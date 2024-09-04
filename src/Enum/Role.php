<?php
// src/Enum/Role.php
namespace App\Enum;

enum Role: string
{
    case ADMIN = 'ADMIN';
    case MANAGER = 'MANAGER';
    case USER = 'USER';
}
?>