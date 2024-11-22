<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;
use DateTime;

class DteStr
{
    public function __construct(string|DateTime $dteStr) {
        AssertFactory::checkFromType(AssertFactory::TYPE_DATE,$dteStr);
    }
}