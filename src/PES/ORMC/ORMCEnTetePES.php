<?php

namespace App\Service\ORMC;

class ORMCEnTetePES
{
    public function __construct(private string $dteStr,private string $idPost,private string $idColl,private string $codCol,private ?string $libellePoste = null,private ?string $finJur = null,private ?string $codBud = null,private ?string $libelleCodBud = null){}
    
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"DteStr",["V"=>$this->dteStr]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdPost",["V"=>$this->idPost]);
        $json = ORMCCommun::addJsonXmlElement($json,"LibellePoste",["V"=>$this->libellePoste]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdColl",["V"=>$this->idColl]);
        $json = ORMCCommun::addJsonXmlElement($json,"FinJur",["V"=>$this->finJur]);
        $json = ORMCCommun::addJsonXmlElement($json,"CodCol",["V"=>$this->codCol]);
        $json = ORMCCommun::addJsonXmlElement($json,"CodBud",["V"=>$this->codBud]);
        $json = ORMCCommun::addJsonXmlElement($json,"LibelleColBud",["V"=>$this->libelleCodBud]);
        return ORMCCommun::addJsonXmlElement([],"EnTetePES",[],$json);
    }
    
}