<?php

namespace App\Service\ORMC;

class ORMCLiensIdent
{
    public function __construct(private ?string $idConv = null,private ?string $idMarche = null,private ?string $idCaution = null,private ?string $idEmprunt = null,private ?string $idActif = null,private ?string $idRegie = null,){}
    
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"IdConv",["V"=>$this->idConv]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdMarche",["V"=>$this->idMarche]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdCaution",["V"=>$this->idCaution]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdEmpruntOrdo",["V"=>$this->idEmprunt]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdActif",["V"=>$this->idActif]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdRegie",["V"=>$this->idRegie]);
        return ORMCCommun::addJsonXmlElement([],"LiensIdent",[],$json);
    }
}