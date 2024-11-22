<?php

namespace App\PES\Type\ComplexeType;

use App\PES\Type\SimpleType\Adresse;
use App\PES\Type\SimpleType\Sigle;

class Emetteur{

    public function __construct(private Sigle $sigle,private Adresse $adresse) {
    }
}