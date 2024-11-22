<?php

namespace App\PES;

use App\PES\Type\ComplexeType\EnTetePES;
use App\PES\Type\ComplexeType\Enveloppe;


class PES_Aller
{
    public function __construct(private string $id,private Enveloppe $enveloppe,private EnTetePES $enTetePES,private ?AbstractDomaine $abstractDomaine) {
        
    }

    /*public function fromString() : self {
        return new self();
    }*/
}
