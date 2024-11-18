<?php

namespace App\Service\ORMC;

use Exception;

class ORMCPiece
{
    public function __construct(private ORMCBlocPiece $blocPiece,private array $ligneDePiece){
        foreach ($this->ligneDePiece as $l) {
            if (!($l instanceof ORMCLigneDePiece)) {
                throw new Exception("\$ligneDePiec doit être de type array[ORMCLigneDePiece].", 1);
            }
        }
    }

    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = array_merge($json,$this->blocPiece->getJson());
        foreach ($this->ligneDePiece as $l) {
            $json = array_merge($json,$l->getJson());
        }
        return ORMCCommun::addJsonXmlElement([],"Piece",[],$json);
    }
}
