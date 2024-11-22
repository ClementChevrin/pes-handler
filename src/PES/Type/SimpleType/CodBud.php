<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;

class CodBud
{
    public function __construct(string $codBud) {
        AssertFactory::checkFromType(AssertFactory::TYPE_CODEBUD2,$codBud);
    }
}