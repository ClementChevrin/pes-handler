<?php

namespace App\PES\Type\SimpleType;

use App\PES\Type\Trait\EnumTrait;

/**
 * Numéro de version du message. Ce numéro est relatif à l'enveloppe.
 */
enum Version: string
{
    use EnumTrait;

    /**
     * Doit être valorisé à 2.
     */
    case _2 = "2";
}