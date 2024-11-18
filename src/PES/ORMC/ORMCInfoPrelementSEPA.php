<?php

namespace App\Service\ORMC;

class ORMCInfoPrelementSEPA
{
    public function __construct(private string $natPrel,private string $perPrel,private string $dtePrel,private string $mtPrel,private string $sequencePres,private string $dateSignMandat,private string $refUniMdt,private ?string $libPrel = null,private ?string $ancienRUM = null,private ?string $ancienICS = null,private ?string $ancienTiersCreancier = null,private ?string $ancienneBanque = null,private ?string $ancienIBAN = null,private ?string $titCpteDiff = null){}
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"NatPrel",["V"=>$this->natPrel]);
        $json = ORMCCommun::addJsonXmlElement($json,"PerPrel",["V"=>$this->perPrel]);
        $json = ORMCCommun::addJsonXmlElement($json,"DtePrel",["V"=>$this->dtePrel]);
        $json = ORMCCommun::addJsonXmlElement($json,"MtPrel",["V"=>$this->mtPrel]);
        $json = ORMCCommun::addJsonXmlElement($json,"SequencePres",["V"=>$this->sequencePres]);
        $json = ORMCCommun::addJsonXmlElement($json,"DateSignMandat",["V"=>$this->dateSignMandat]);
        $json = ORMCCommun::addJsonXmlElement($json,"RefUniMdt",["V"=>$this->refUniMdt]);
        $json = ORMCCommun::addJsonXmlElement($json,"LibPrel",["V"=>$this->libPrel]);
        $json = ORMCCommun::addJsonXmlElement($json,"AncienRUM",["V"=>$this->ancienRUM]);
        $json = ORMCCommun::addJsonXmlElement($json,"AncienICS",["V"=>$this->ancienICS]);
        $json = ORMCCommun::addJsonXmlElement($json,"AncienTiersCreancier",["V"=>$this->ancienTiersCreancier]);
        $json = ORMCCommun::addJsonXmlElement($json,"AncienneBanque",["V"=>$this->ancienneBanque]);
        $json = ORMCCommun::addJsonXmlElement($json,"AncienIBAN",["V"=>$this->ancienIBAN]);
        $json = ORMCCommun::addJsonXmlElement($json,"TitCpteDiff",["V"=>$this->titCpteDiff]);
        return ORMCCommun::addJsonXmlElement([],"InfoPrelevementSEPA",[],$json);
    }
}