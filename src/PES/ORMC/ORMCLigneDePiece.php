<?php

namespace App\Service\ORMC;

use Exception;

class ORMCLigneDePiece
{
    public function __construct(private ORMCBlocLignePiece $blocLignePiece,private array $tiers = [],private array $recouvrement = []){
        foreach ($tiers as $t) {
            if (!($t instanceof ORMCTiers)) {
                throw new Exception("\$piece doit être de type array[ORMCTiers].", 1);
            }
        }
        foreach ($recouvrement as $r) {
            if (!($r instanceof ORMCRecouvrement)) {
                throw new Exception("\$piece doit être de type array[ORMCRecouvrement].", 1);
            }
        }
    }
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = array_merge($json,$this->blocLignePiece->getJson());
        foreach ($this->tiers as $t) {
            $json = array_merge($json,$t->getJson());
        }
        foreach ($this->recouvrement as $r) {
            $json = array_merge($json,$r->getJson());
        }
        return ORMCCommun::addJsonXmlElement([],"LigneDePiece",[],$json);
    }
}