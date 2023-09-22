<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class FuelType extends Enum
{
    const GASOLINE = 'gasoline';
    const DIESEL = 'diesel';
    const GAS = 'gas';
    const ELECTRIC = 'electric';
    const HYBRID = 'hybrid';
    
}
