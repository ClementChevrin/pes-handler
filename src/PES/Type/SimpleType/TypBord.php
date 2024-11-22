<?php

namespace App\PES\Type\SimpleType;

/**
 * Informations destinées à déterminer le type de bordereau transmis par l'ordonnateur.
 */
abstract class TypBord
{
    /**
     * Ordinaire.
     */
    const _01 = "01";
    /**
     * Annulation/rédcution.
     */
    const _02 = "02";
    /**
     * Ordres de recette.
     */
    const _03 = "03";
    /**
     * 
     */
    const _04 = "04";
    /**
     * 
     */
    const _05 = "05";
    /**
     * Ordres de recette multi créanciers (ORMC)
     */
    const _06 = "06";
}
