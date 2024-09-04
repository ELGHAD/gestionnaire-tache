<?php
// src/Enum/TaskStatus.php
namespace App\Enum;

enum TaskStatus: string
{
    case TO_DO = 'TO_DO';
    case IN_PROGRESS = 'IN_PROGRESS';
    case DONE = 'DONE';
}
