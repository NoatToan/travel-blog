<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class BaseEnum extends Enum
{
    static public function getJson()
    {
        return json_encode(self::asArray());
    }
}
