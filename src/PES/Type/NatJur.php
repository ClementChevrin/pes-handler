<?php

namespace App\Service\ORMC\ORMCType;

/**
 * Nature jurdique du Tiers.
 */
abstract class NatJur
{
    /**
     * Particuliers.
     */
    const _01 = "01";
    /**
     * Artisan / Commerçant / Agriculteur.
     */
    const _02 = "02";
    /**
     * Société.
     */
    const _03 = "03";
    /**
     * CAM ou caisse appliquant les mêmes règles.
     */
    const _04 = "04";
    /**
     * Caisse complémentaire.
     */
    const _05 = "05";
    /**
     * Association.
     */
    const _06 = "06";
    /**
     * Etat ou organisme d'Etat.
     */
    const _07 = "07";
    /**
     * Etablissement public national.
     */
    const _08 = "08";
    /**
     * Collectivité territoriale / EPL /EPS.
     */
    const _09 = "09";
    /**
     * Etat étranger / ambassade.
     */
    const _10 = "10";
    /**
     * CAF.
     */
    const _11 = "11";
}
