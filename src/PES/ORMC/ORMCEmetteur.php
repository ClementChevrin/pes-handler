<?php

namespace App\Service\ORMC;

class ORMCEmetteur
{
    public function __construct(private string $sigle,private string $adresse){}
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"Sigle",["V"=>$this->sigle]);
        $json = ORMCCommun::addJsonXmlElement($json,"Adresse",["V"=>$this->adresse]);
        return ORMCCommun::addJsonXmlElement([],"Emetteur",[],$json);
    }
}