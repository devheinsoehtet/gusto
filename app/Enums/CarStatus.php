<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class CarStatus extends Enum
{
    const AVAILABLE = 1;
    const TAKEN = 2;
    const MAINTENANCE = 3;
}


// enum CarStatus:int {
//     case AVAILABLE = 1;
//     case TAKEN = 2;
//     case MAINTENANCE = 3;
   
// }