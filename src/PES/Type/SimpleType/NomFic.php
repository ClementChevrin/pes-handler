<?php

namespace App\PES\Type\SimpleType;

use App\PES\Assert\AssertFactory;

/**
 * Numéro de version du message. Ce numéro est relatif à l'enveloppe.
 */
class NomFic
{
    public function __construct(string $nomFic) {
        AssertFactory::checkFromType(AssertFactory::TYPE_TEXTE100,$nomFic);
    }
}