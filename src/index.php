<?php

namespace App;

use App\PES\PES_Aller;
use App\PES\Type\SimpleType\DteStr;
use App\PES\Type\SimpleType\Sigle;
use App\PES\Type\SimpleType\Adresse;
use App\PES\Type\SimpleType\NomFic;
use App\PES\Type\SimpleType\TypFic;
use App\PES\Type\SimpleType\Version;
use App\PES\Type\ComplexeType\Emetteur;
use App\PES\Type\ComplexeType\EnTetePES;
use App\PES\Type\ComplexeType\Enveloppe;
use App\PES\Type\ComplexeType\Recepteur;
use App\PES\Type\ComplexeType\Parametres;
use App\PES\Type\SimpleType\CodBud;
use App\PES\Type\SimpleType\CodCol;
use App\PES\Type\SimpleType\FinJur;
use App\PES\Type\SimpleType\IdColl;
use App\PES\Type\SimpleType\IdPost;
use App\PES\Type\SimpleType\LibelleColBud;
use App\PES\Type\SimpleType\LibellePoste;

$pes = new PES_Aller(
    "File.xml",
    new Enveloppe(
        new Parametres(
            Version::_2,
            TypFic::_PESALR1,
            new NomFic("File.xml"),
        ),
        new Emetteur(
            new Sigle(""),
            new Adresse("")
        ),
        new Recepteur(
            new Sigle(""),
            new Adresse("")
        )
    ),
    new EnTetePES(
        new DteStr(""),
        new IdPost(""),
        new LibellePoste(""),
        new IdColl(""),
        new FinJur(""),
        new CodCol(""),
        new CodBud(""),
        new LibelleColBud(""),
    ),
    null
);
