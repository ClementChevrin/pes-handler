<?php

namespace App\PES\Type\SimpleType;

/**
 * Mode de prélèvement.
 */
abstract class NatPrel
{
    /**
     * Fichier remis aux organismes bancaire par le Trésor.
     */
    const _01 = "01";
    /**
     * Fichier remis aux organismes bancaires par l'ordonnateur.
     */
    const _02 = "02";
}
