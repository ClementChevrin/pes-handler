<?php

namespace App\PES\Type\ComplexeType;

use App\PES\Type\ComplexeType\Emetteur;
use App\PES\Type\ComplexeType\Recepteur;
use App\PES\Type\ComplexeType\Parametres;

class Enveloppe{

    public function __construct(private Parametres $parametres,private Emetteur $emetteur,private ?Recepteur $recepteur) {
    }
}