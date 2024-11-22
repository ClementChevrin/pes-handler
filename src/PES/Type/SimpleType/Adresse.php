<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;


class Adresse
{
    public function __construct(string $adresse) {
        AssertFactory::checkFromType(AssertFactory::TYPE_TEXTE38,$adresse);
    }
}