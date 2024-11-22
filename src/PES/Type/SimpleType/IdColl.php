<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;

class IdColl
{
    public function __construct(string $idColl) {
        AssertFactory::checkFromType(AssertFactory::TYPE_NUM14_LIGHT,$idColl);
    }
}