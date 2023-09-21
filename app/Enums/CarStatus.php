<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class CarStatus extends Enum
{
    const AVAILABLE = 1;
    const TAKEN = 2;
    const MAINTENANCE = 3;
}
