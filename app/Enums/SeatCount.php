<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SeatCount extends Enum
{
    const TWO = '2';
    const FOUR = '4';
    const FIVE = '5';
    const EIGHT = '8';
}
