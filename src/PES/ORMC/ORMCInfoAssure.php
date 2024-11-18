<?php

namespace App\Service\ORMC;

class ORMCInfoAssure
{
    public function __construct(private string $codAssDeb,private ?string $codAyantDroit = null){}
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"CodAssDeb",["V"=>$this->codAssDeb]);
        $json = ORMCCommun::addJsonXmlElement($json,"CodAyantDroit",["V"=>$this->codAyantDroit]);
        return ORMCCommun::addJsonXmlElement([],"InfoAssure",[],$json);
    }
}