<?php

namespace App\Service\ORMC;

use Exception;

class ORMCPES_RecetteAller
{
    public function __construct(private ORMCEnTeteRecette $enTeteRecette,private array $bordereau){
        foreach ($this->bordereau as $b) {
            if (!($b instanceof ORMCBordereau)) {
                throw new Exception("\$bordereau doit être de type array[ORMCBordereau].", 1);
            }
        }
    }
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = array_merge($json,$this->enTeteRecette->getJson());
        foreach ($this->bordereau as $b) {
            $json = array_merge($json,$b->getJson());
        }
        return ORMCCommun::addJsonXmlElement([],"PES_RecetteAller",[],$json);
    }
}