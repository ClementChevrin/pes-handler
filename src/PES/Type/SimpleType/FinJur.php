<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;

class FinJur
{
    public function __construct(string $finJur) {
        AssertFactory::checkFromType(AssertFactory::TYPE_ALPHANUM20_LIGHT,$finJur);
    }
}