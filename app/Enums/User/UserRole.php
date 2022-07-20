<?php

namespace App\Enums\User;

use App\Enums\BaseEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserRole extends BaseEnum
{
    const ADMIN =   1;
    const INTERVIEWER =   2;
    const INTERVIEWEE = 3;
    const UN_SET = 4;
}
