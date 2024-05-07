<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ToDoListStatus extends Enum
{
    const completed = 1;
    const pending = 2;
    const unresolved = 3;
}
