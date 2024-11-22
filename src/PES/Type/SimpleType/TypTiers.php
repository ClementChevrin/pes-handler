<?php

namespace App\PES\Type\SimpleType;

/**
 * Type de tiers : Zone indiquant le type de tiers. La notion de tiers est plus large que celle de débiteur.
 */
abstract class TypTiers
{
    /**
     * Débiteur principal.
     */
    const _01 = "01";
    /**
     * Débiteur appliquant des règles particulières et pouvant assumer la totalité des frais de séjours.
     */
    const _02 = "02";
    /**
     * Débiteur solidaire.
     */
    const _03 = "03";
    /**
     * Co-débiteur.(Cette information ne doit pas être utilisée dans le cas d'une dette conjointe)
     */
    const _04 = "04";
    /**
     * Employeur.
     */
    const _05 = "05";
    /**
     * Malade.
     */
    const _06 = "06";
    /**
     * Assuré.
     */
    const _07 = "07";
    /**
     * Client.
     */
    const _10 = "10";
    /**
     * Acheteur.
     */
    const _11 = "11";
    /**
     * Destinataire.
     */
    const _12 = "12";
    /**
     * Facture.
     */
    const _13 = "13";
    /**
     * Gestionnaire TVA.
     */
    const _14 = "14";
    /**
     * Comptable (Client).
     */
    const _15 = "15";
    /**
     * Emetteur.
     */
    const _20 = "20";
    /**
     * Vendeur.
     */
    const _21 = "21";
    /**
     * Expéditeur.
     */
    const _22 = "22";
    /**
     * Fabricant.
     */
    const _23 = "23";
    /**
     * Fournisseur.
     */
    const _24 = "24";
    /**
     * Destinataire Paiement.
     */
    const _25 = "25";
    /**
     * Comptable (Emetteur).
     */
    const _26 = "26";
    /**
     * Logement.
     */
    const _30 = "30";
}
