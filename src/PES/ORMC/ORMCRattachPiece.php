<?php

namespace App\Service\ORMC;

class ORMCRattachPiece
{
    public function __construct(private string $natPceOrig,private string $exerRat,private string $idPceOrig,private ?string $idLigneOrig = null){}
    
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"NatPceOrig",["V"=>$this->natPceOrig]);
        $json = ORMCCommun::addJsonXmlElement($json,"ExerRat",["V"=>$this->exerRat]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdPceOrig",["V"=>$this->idPceOrig]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdLigneOrig",["V"=>$this->idLigneOrig]);
        return ORMCCommun::addJsonXmlElement([],"RattachPiece",[],$json);
    }
}