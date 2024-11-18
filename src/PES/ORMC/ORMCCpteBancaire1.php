<?php

namespace App\Service\ORMC;

class ORMCCpteBancaire1
{
    public function __construct(private string $codeEtab,private string $codeGuic,private string $idCpte,private string $cleRib,private string $titCpte,private ?string $idPayInt = null,private ?string $idBancInt = null,private ?string $libBanc = null,private ?string $dteBanc = null){}
    
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"IdPayInt",["V"=>$this->idPayInt]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdBancInt",["V"=>$this->idBancInt]);
        $json = ORMCCommun::addJsonXmlElement($json,"CodeEtab",["V"=>$this->codeEtab]);
        $json = ORMCCommun::addJsonXmlElement($json,"CodeGuic",["V"=>$this->codeGuic]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdCpte",["V"=>$this->idCpte]);
        $json = ORMCCommun::addJsonXmlElement($json,"CleRib",["V"=>$this->cleRib]);
        $json = ORMCCommun::addJsonXmlElement($json,"LibBanc",["V"=>$this->libBanc]);
        $json = ORMCCommun::addJsonXmlElement($json,"TitCpte",["V"=>$this->titCpte]);
        $json = ORMCCommun::addJsonXmlElement($json,"DteBanc",["V"=>$this->dteBanc]);
        return ORMCCommun::addJsonXmlElement([],"CpteBancaire",[],$json);
    }
}