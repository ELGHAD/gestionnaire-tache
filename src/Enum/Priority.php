<?php 
// src/Enum/Priority.php
namespace App\Enum;

enum Priority: string
{
    case HIGH = 'HIGH';
    case MEDIUM = 'MEDIUM';
    case LOW = 'LOW';
}
