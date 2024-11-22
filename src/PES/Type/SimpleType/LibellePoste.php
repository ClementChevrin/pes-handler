<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;

class LibellePoste
{
    public function __construct(string $libellePoste) {
        AssertFactory::checkFromType(AssertFactory::TYPE_TEXTE38,$libellePoste);
    }
}