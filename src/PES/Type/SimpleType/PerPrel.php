<?php

namespace App\PES\Type\SimpleType;

/**
 * Périodicité du prélèvement.
 */
abstract class PerPrel
{
    /**
     * Bimestrielle
     */
    const _01 = "01";
    /**
     * Mensuelle
     */
    const _02 = "02";
    /**
     * Bimensuelle
     */
    const _03 = "03";
    /**
     * Trimestrielle
     */
    const _04 = "04";
    /**
     * Semestrielle
     */
    const _05 = "05";
    /**
     * Annuelle
     */
    const _06 = "06";
    /**
     * Unique
     */
    const _07 = "07";
}
