<?php

namespace App\PES\Type\ComplexeType;

use App\PES\Type\SimpleType\CodBud;
use App\PES\Type\SimpleType\CodCol;
use App\PES\Type\SimpleType\DteStr;
use App\PES\Type\SimpleType\FinJur;
use App\PES\Type\SimpleType\IdColl;
use App\PES\Type\SimpleType\IdPost;
use App\PES\Type\SimpleType\LibelleColBud;
use App\PES\Type\SimpleType\LibellePoste;

class EnTetePES{

    public function __construct(private DteStr $dteStr,private IdPost $idPost,private LibellePoste $libellePoste,private IdColl $idColl,private FinJur $finJur,private CodCol $codCol,private CodBud $codBud,private LibelleColBud $libelleColBud) {
    }
}