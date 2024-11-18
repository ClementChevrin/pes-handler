<?php

namespace App\Service\ORMC;

class ORMCParametres
{
    public function __construct(private string $version,private string $typFic,private string $nomFic){}
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"Version",["V"=>$this->version]);
        $json = ORMCCommun::addJsonXmlElement($json,"TypFic",["V"=>$this->typFic]);
        $json = ORMCCommun::addJsonXmlElement($json,"NomFic",["V"=>$this->nomFic]);
        return ORMCCommun::addJsonXmlElement([],"Parametres",[],$json);
    }
}