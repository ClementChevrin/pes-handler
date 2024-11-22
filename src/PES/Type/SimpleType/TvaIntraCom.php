<?php

namespace App\PES\Type\SimpleType;

/**
 * Information permettant de déterminer si la ligne de pièce comporte de la TVA intra-communautaire.
 */
abstract class TvaIntraCom
{
    /**
     * Pas de Tva intra-communautaire.
     */
    const _0 = "0";
    /**
     * Tva intra-communautaire.
     */
    const _1 = "1";
}
