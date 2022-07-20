<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class BaseEnum extends Enum
{
    public static function getJson()
    {
        return json_encode(self::asArray());
    }
}
