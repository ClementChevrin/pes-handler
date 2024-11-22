<?php

namespace App\PES\Type\ComplexeType;

use App\PES\Type\SimpleType\NomFic;
use App\PES\Type\SimpleType\TypFic;
use App\PES\Type\SimpleType\Version;

class Parametres{

    public function __construct(private Version $version,private TypFic $typFic,private NomFic $nomFic) {
    }
}