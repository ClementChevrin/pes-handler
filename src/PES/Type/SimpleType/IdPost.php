<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;

class IdPost
{
    public function __construct(string $idPost) {
        AssertFactory::checkFromType(AssertFactory::TYPE_TEXTECODIQUE7,$idPost);
    }
}