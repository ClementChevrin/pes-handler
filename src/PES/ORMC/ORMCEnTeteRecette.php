<?php

namespace App\Service\ORMC;

class ORMCEnTeteRecette
{
    public function __construct(private string $idVer,private ?string $infoDematerialisee = null){}
    
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"IdVer",["V"=>$this->idVer]);
        $json = ORMCCommun::addJsonXmlElement($json,"InfoDematerialisee",["V"=>$this->infoDematerialisee]);
        return ORMCCommun::addJsonXmlElement([],"EnTeteRecette",[],$json);
    }
}
