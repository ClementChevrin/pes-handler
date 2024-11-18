<?php

namespace App\Service\ORMC;

class ORMCRecepteur
{
    public function __construct(private ?string $sigle = null,private ?string $adresse = null){}
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"Sigle",["V"=>$this->sigle]);
        $json = ORMCCommun::addJsonXmlElement($json,"Adresse",["V"=>$this->adresse]);
        return ORMCCommun::addJsonXmlElement([],"Recepteur",[],$json);
    }
}