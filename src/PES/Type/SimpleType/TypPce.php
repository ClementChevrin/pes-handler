<?php

namespace App\PES\Type\SimpleType;

/**
 * Informations destinées à déterminer le type de pièce transmis par l'ordonnateur. Cette zone permet d'effectuer des contrôles avec le type de bordereau.
 */
abstract class TypPce
{
    /**
     * Titre ordinaire
     */
    const _01 = "01";
    /**
     * Titre correctif
     */
    const _02 = "02";
    /**
     * Titre d'ordre budgétaire
     */
    const _03 = "03";
    /**
     * Titre d'ordre mixte
     */
    const _04 = "04";
    /**
     * Titre émis après paiement
     */
    const _05 = "05";
    /**
     * Titre récapitulatif avec rôle
     */
    const _06 = "06";
    /**
     * Titre récapitulatif sans rôle
     */
    const _07 = "07";
    /**
     * Titre de majoration
     */
    const _09 = "09";
    /**
     * Titre en plusieurs années
     */
    const _10 = "10";
    /**
     * Titre de rattachement
     */
    const _11 = "11";
    /**
     * Ordre de recette ordonnateur
     */
    const _12 = "12";
    /**
     * Produits constatés d'avance
     */
    const _14 = "14";
    /**
     * Titre ORMC
     */
    const _15 = "15";
}
