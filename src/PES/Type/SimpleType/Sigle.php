<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;


class Sigle
{
    public function __construct(string $sigle) {
        AssertFactory::checkFromType(AssertFactory::TYPE_TEXTE32,$sigle);
    }
}