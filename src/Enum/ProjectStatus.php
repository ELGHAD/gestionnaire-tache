<?php
// src/Enum/ProjectStatus.php
namespace App\Enum;

enum ProjectStatus: string
{
    case NOT_STARTED = 'NOT_STARTED';
    case IN_PROGRESS = 'IN_PROGRESS';
    case COMPLETED = 'COMPLETED';
}
