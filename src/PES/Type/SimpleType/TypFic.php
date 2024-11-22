<?php

namespace App\PES\Type\SimpleType;

use App\PES\Type\Trait\EnumTrait;

/**
 * Code du type de fichier.
 */
enum TypFic: string
{
    use EnumTrait;
    
    /**
     * Pour le PES_Aller.
     */
    case _PESALR1 = "PESALR1";
    /**
     * Pour l'ORMC.
     */
    case _PESORMC = "PESORMC";
}
