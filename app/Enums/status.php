<?php
namespace App\Enums;

enum Status: int {
    case PENDING = 2;
    case ACTIVE = 1;
    case INACTIVE = 0;
    case COMPLETED = 3;
}
