<?php

namespace App\Service\ORMC\ORMCType;

/**
 * Liste des éléments commun.
 */
abstract class Common
{
    /**
     * Valeur valide pour l'accés : `PES_RecetteAller/Bordereau/Piece/LigneDePiece/Tiers/Adresse/Adr2`
     */
    const _Adr2 = "ESPACE CREATIS";
    /**
     * Valeur valide pour l'accés : `PES_RecetteAller/Bordereau/Piece/LigneDePiece/Tiers/Adresse/CP`
     */
    const _CP = "02100";
    /**
     * Valeur valide pour l'accés : `PES_RecetteAller/Bordereau/Piece/LigneDePiece/Tiers/Adresse/Ville`
     */
    const _Ville = "SAINT QUENTIN";
    /**
     * Valeur valide pour l'accés : `Enveloppe/Emetteur/Sigle`
     */
    const _SigleEmet = "CASQ-SAINT-QUENTIN AUTO-EDITEUR";
    /**
     * Valeur valide pour l'accés : `Enveloppe/Emetteur/Adresse`
     */
    const _AdresseEmet = "SCHEMAS PES DU 2011 12 13";
    /**
     * Valeur valide pour l'accés : `Enveloppe/Recepteur/Sigle`
     */
    const _SigleRecep = "TPM";
    /**
     * Valeur valide pour l'accés : `Enveloppe/Recepteur/Adresse`
     */
    const _AdresseRecep = "RUE DE LORRAINE - SAINT QUENTIN";
    /**
     * Valeur valide pour l'accés : `EnTetePES/IdPost`
     */
    const _IdPost = "002060";
    /**
     * Valeur valide pour l'accés : `EnTetePES/IdColl`
     */
    const _IdColl = "20007189200067";
    /**
     * Valeur valide pour l'accés : `EnTetePES/CodCol`
     */
    const _CodCol = "211";
    /**
     * Valeur valide pour l'accés : `EnTetePES/CodBud`
     */
    const _CodBud = "00";
    /**
     * Valeur valide pour l'accés : `EnTetePES/LibelleColBud`
     */
    const _LibelleColBud = "BUDGET PRINCIPAL";
}
