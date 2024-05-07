<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ToDoListTaskPriority extends Enum
{
    const high = 1;
    const medium = 2;
    const low = 3;
}
