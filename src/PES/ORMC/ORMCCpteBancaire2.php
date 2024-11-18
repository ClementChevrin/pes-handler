<?php

namespace App\Service\ORMC;

class ORMCCpteBancaire2
{
    public function __construct(private string $iBAN,private string $titCpte,private ?string $bIC = null,private ?string $libBanc = null,private ?string $dteBanc = null){}
    
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"BIC",["V"=>$this->bIC]);
        $json = ORMCCommun::addJsonXmlElement($json,"IBAN",["V"=>$this->iBAN]);
        $json = ORMCCommun::addJsonXmlElement($json,"LibBanc",["V"=>$this->libBanc]);
        $json = ORMCCommun::addJsonXmlElement($json,"TitCpte",["V"=>$this->titCpte]);
        $json = ORMCCommun::addJsonXmlElement($json,"DteBanc",["V"=>$this->dteBanc]);
        return ORMCCommun::addJsonXmlElement([],"CpteBancaire",[],$json);
    }
}