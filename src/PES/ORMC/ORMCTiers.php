<?php

namespace App\Service\ORMC;

class ORMCTiers
{
    public function __construct(private ORMCInfoTiers $infoTiers,private ORMCAdresse $adresse,private ORMCCpteBancaire1|ORMCCpteBancaire2|null $cpteBancaire = null){}

    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $cpteBancaireArray = ($this->cpteBancaire)?$this->cpteBancaire->getJson():[];
        $json = [];
        return ORMCCommun::addJsonXmlElement($json,"Tiers",[],array_merge($this->infoTiers->getJson(),$this->adresse->getJson(),$cpteBancaireArray));
    }
}