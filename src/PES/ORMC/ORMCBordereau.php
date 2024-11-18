<?php

namespace App\Service\ORMC;

use Exception;

class ORMCBordereau
{
    public function __construct(private string $id,private ORMCBlocBordereau $blocBordereau,private array $piece){
        foreach ($this->piece as $p) {
            if (!($p instanceof ORMCPiece)) {
                throw new Exception("\$piece doit être de type array[ORMCPiece].", 1);
            }
        }
    }
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = array_merge($json,$this->blocBordereau->getJson());
        foreach ($this->piece as $p) {
            $json = array_merge($json,$p->getJson());
        }
        return ORMCCommun::addJsonXmlElement([],"Bordereau",["Id"=>$this->id],$json);
    }
}