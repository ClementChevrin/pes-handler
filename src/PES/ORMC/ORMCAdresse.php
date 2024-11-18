<?php

namespace App\Service\ORMC;

class ORMCAdresse
{
    public function __construct(private string $typAdr,private string $adr2,private string $cP,private string $ville,private string $codRes,private ?string $adr1 = null,private ?string $adr3 = null,private ?string $codPays = null,private ?string $dteAdr = null){}
    
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"TypAdr",["V"=>$this->typAdr]);
        $json = ORMCCommun::addJsonXmlElement($json,"Adr1",["V"=>$this->adr1]);
        $json = ORMCCommun::addJsonXmlElement($json,"Adr2",["V"=>$this->adr2]);
        $json = ORMCCommun::addJsonXmlElement($json,"Adr3",["V"=>$this->adr3]);
        $json = ORMCCommun::addJsonXmlElement($json,"CP",["V"=>$this->cP]);
        $json = ORMCCommun::addJsonXmlElement($json,"Ville",["V"=>$this->ville]);
        $json = ORMCCommun::addJsonXmlElement($json,"CodRes",["V"=>$this->codRes]);
        $json = ORMCCommun::addJsonXmlElement($json,"CodPays",["V"=>$this->codPays]);
        $json = ORMCCommun::addJsonXmlElement($json,"DteAdr",["V"=>$this->dteAdr]);
        return ORMCCommun::addJsonXmlElement([],"Adresse",[],$json);
    }
}