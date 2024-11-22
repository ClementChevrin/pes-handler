<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;

class CodCol
{
    public function __construct(string $codCol) {
        AssertFactory::checkFromType(AssertFactory::TYPE_CODECOL3,$codCol);
    }
}