<?php

namespace App\Service\ORMC;

use Exception;

class ORMCInfoLignePiece
{
    private array $pJRef;
    public function __construct(private string $idLigne,private string $codProdLoc,private string $nature,private string $majo,private string $tvaIntraCom,private string $mtHT,private ?string $objLignePce = null,private ?string $finGeo = null,private ?string $codEtGeo = null,private ?string $fonction = null,private ?string $operation = null,private ?string $txTva = null,private ?string $dteMajo = null,private ?string $txMajo = null,private ?string $cpteTiers = null,private ?string $tVAImportation = null,private ?string $mtTVA = null,private ?string $mtNonMajo = null,private ?string $infoCollBen = null,array $pJRef = [])
    {
        foreach ($pJRef as $p) {
            if (!($p instanceof ORMCPJReference)) {
                throw new Exception("\$ligneDePiec doit être de type array[ORMCPJReference].", 1);
            }
        }
        $this->pJRef=$pJRef;
    }
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"IdLigne",["V"=>$this->idLigne]);
        $json = ORMCCommun::addJsonXmlElement($json,"ObjLignePce",["V"=>$this->objLignePce]);
        $json = ORMCCommun::addJsonXmlElement($json,"CodProdLoc",["V"=>$this->codProdLoc]);
        $json = ORMCCommun::addJsonXmlElement($json,"FinGeo",["V"=>$this->finGeo]);
        $json = ORMCCommun::addJsonXmlElement($json,"CodEtGeo",["V"=>$this->codEtGeo]);
        $json = ORMCCommun::addJsonXmlElement($json,"Nature",["V"=>$this->nature]);
        $json = ORMCCommun::addJsonXmlElement($json,"Fonction",["V"=>$this->fonction]);
        $json = ORMCCommun::addJsonXmlElement($json,"Operation",["V"=>$this->operation]);
        $json = ORMCCommun::addJsonXmlElement($json,"TxTva",["V"=>$this->txTva]);
        $json = ORMCCommun::addJsonXmlElement($json,"Majo",["V"=>$this->majo]);
        $json = ORMCCommun::addJsonXmlElement($json,"DteMajo",["V"=>$this->dteMajo]);
        $json = ORMCCommun::addJsonXmlElement($json,"TxMajo",["V"=>$this->txMajo]);
        $json = ORMCCommun::addJsonXmlElement($json,"CpteTiers",["V"=>$this->cpteTiers]);
        $json = ORMCCommun::addJsonXmlElement($json,"TvaIntraCom",["V"=>$this->tvaIntraCom]);
        $json = ORMCCommun::addJsonXmlElement($json,"TVAImportation",["V"=>$this->tVAImportation]);
        $json = ORMCCommun::addJsonXmlElement($json,"MtHT",["V"=>$this->mtHT]);
        $json = ORMCCommun::addJsonXmlElement($json,"MtTVA",["V"=>$this->mtTVA]);
        $json = ORMCCommun::addJsonXmlElement($json,"MtNonMajo",["V"=>$this->mtNonMajo]);
        $json = ORMCCommun::addJsonXmlElement($json,"InfoCollBen",["V"=>$this->infoCollBen]);
        foreach ($this->pJRef as $pj) {
            $json = array_merge($json,$pj->getJson());
        }
        return ORMCCommun::addJsonXmlElement([],"InfoLignePiece",[],$json);
    }
}