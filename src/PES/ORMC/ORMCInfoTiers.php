<?php

namespace App\Service\ORMC;

class ORMCInfoTiers
{
    public function __construct(private string $catTiers,private string $natJur,private string $typTiers,private string $nom,private ?string $idTiers = null,private ?string $dteNaissance = null,private ?string $natIdTiers = null,private ?string $dteIdTiers = null,private ?string $refTiers = null,private ?string $civilite = null,private ?string $complNom = null,private ?string $prenom = null,private ?string $lieuNaissance = null){}
    
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"IdTiers",["V"=>$this->idTiers]);
        $json = ORMCCommun::addJsonXmlElement($json,"DteNaissance",["V"=>$this->dteNaissance]);
        $json = ORMCCommun::addJsonXmlElement($json,"NatIdTiers",["V"=>$this->natIdTiers]);
        $json = ORMCCommun::addJsonXmlElement($json,"DteIdTiers",["V"=>$this->dteIdTiers]);
        $json = ORMCCommun::addJsonXmlElement($json,"RefTiers",["V"=>$this->refTiers]);
        $json = ORMCCommun::addJsonXmlElement($json,"CatTiers",["V"=>$this->catTiers]);
        $json = ORMCCommun::addJsonXmlElement($json,"NatJur",["V"=>$this->natJur]);
        $json = ORMCCommun::addJsonXmlElement($json,"TypTiers",["V"=>$this->typTiers]);
        $json = ORMCCommun::addJsonXmlElement($json,"Civilite",["V"=>$this->civilite]);
        $json = ORMCCommun::addJsonXmlElement($json,"Nom",["V"=>$this->nom]);
        $json = ORMCCommun::addJsonXmlElement($json,"ComplNom",["V"=>$this->complNom]);
        $json = ORMCCommun::addJsonXmlElement($json,"Prenom",["V"=>$this->prenom]);
        $json = ORMCCommun::addJsonXmlElement($json,"LieuNaissance",["V"=>$this->lieuNaissance]);
        return ORMCCommun::addJsonXmlElement([],"InfoTiers",[],$json);
    }
}