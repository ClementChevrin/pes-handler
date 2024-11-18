<?php

namespace App\Service\ORMC;

class ORMCBlocBordereau
{
    public function __construct(private string $exer,private string $idBord,private string $dteBordEm,private string $typBord,private string $nbrPce,private string $mtBordHt,private ?string $mtCumulAnnuel = null,private ?string $mtBordTVA = null,private ?string $dteAsp = null,private ?string $objet = null){}
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"Exer",["V"=>$this->exer]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdBord",["V"=>$this->idBord]);
        $json = ORMCCommun::addJsonXmlElement($json,"DteBordEm",["V"=>$this->dteBordEm]);
        $json = ORMCCommun::addJsonXmlElement($json,"TypBord",["V"=>$this->typBord]);
        $json = ORMCCommun::addJsonXmlElement($json,"NbrPce",["V"=>$this->nbrPce]);
        $json = ORMCCommun::addJsonXmlElement($json,"MtCumulAnnuel",["V"=>$this->mtCumulAnnuel]);
        $json = ORMCCommun::addJsonXmlElement($json,"MtBordHt",["V"=>$this->mtBordHt]);
        $json = ORMCCommun::addJsonXmlElement($json,"MtBordTVA",["V"=>$this->mtBordTVA]);
        $json = ORMCCommun::addJsonXmlElement($json,"DteAsp",["V"=>$this->dteAsp]);
        $json = ORMCCommun::addJsonXmlElement($json,"Objet",["V"=>$this->objet]);
        return ORMCCommun::addJsonXmlElement([],"BlocBordereau",[],$json);
    }
}