<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;

class LibelleColBud
{
    public function __construct(string $libelleColBud) {
        AssertFactory::checkFromType(AssertFactory::TYPE_TEXTE38,$libelleColBud);
    }
}