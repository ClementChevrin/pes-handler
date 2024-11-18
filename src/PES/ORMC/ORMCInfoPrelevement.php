<?php

namespace App\Service\ORMC;

class ORMCInfoPrelevement
{
    public function __construct(private string $natPrel,private string $perPrel,private string $dtePrel,private string $mtPrel){}
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
        return ORMCCommun::addJsonXmlElement([],"InfoPrelevement",[],$json);
    }
}