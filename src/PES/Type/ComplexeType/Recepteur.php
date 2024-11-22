<?php

namespace App\PES\Type\ComplexeType;

use App\PES\Type\SimpleType\Sigle;
use App\PES\Type\SimpleType\Adresse;

class Recepteur{

    public function __construct(private ?Sigle $sigle,private ?Adresse $adresse) {
    }
}