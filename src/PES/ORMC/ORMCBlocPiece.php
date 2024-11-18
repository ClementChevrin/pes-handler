<?php

namespace App\Service\ORMC;

use Exception;

class ORMCBlocPiece
{
    private array $pJRef;
    public function __construct(private string $idPce,private string $typPce,private string $natPce,private ?string $codServ = null,private ?string $affect = null,private ?string $idRol = null,private ?string $dteAsp = null,private ?string $edition = null,private ?string $objPce = null,private ?string $debFact = null,private ?string $finFact = null,private ?string $numDette = null,private ?string $per = null,private ?string $cle1 = null,private ?string $cle2 = null,array $pJRef = [],private ?string $numeroFacture = null,private ?string $numeroMarche = null,private ?string $numeroEngagement = null,private ?string $codeService = null,private ?string $nomService = null)
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
        $json = ORMCCommun::addJsonXmlElement($json,"CodServ",["V"=>$this->codeService]);
        $json = ORMCCommun::addJsonXmlElement($json,"Affect",["V"=>$this->affect]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdPce",["V"=>$this->idPce]);
        $json = ORMCCommun::addJsonXmlElement($json,"TypPce",["V"=>$this->typPce]);
        $json = ORMCCommun::addJsonXmlElement($json,"NatPce",["V"=>$this->natPce]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdRol",["V"=>$this->idRol]);
        $json = ORMCCommun::addJsonXmlElement($json,"DteAsp",["V"=>$this->dteAsp]);
        $json = ORMCCommun::addJsonXmlElement($json,"Edition",["V"=>$this->edition]);
        $json = ORMCCommun::addJsonXmlElement($json,"ObjPce",["V"=>$this->objPce]);
        $json = ORMCCommun::addJsonXmlElement($json,"DebFact",["V"=>$this->debFact]);
        $json = ORMCCommun::addJsonXmlElement($json,"FinFact",["V"=>$this->finFact]);
        $json = ORMCCommun::addJsonXmlElement($json,"NumDette",["V"=>$this->numDette]);
        $json = ORMCCommun::addJsonXmlElement($json,"Per",["V"=>$this->per]);
        $json = ORMCCommun::addJsonXmlElement($json,"Cle1",["V"=>$this->cle1]);
        $json = ORMCCommun::addJsonXmlElement($json,"Cle2",["V"=>$this->cle2]);
        foreach ($this->pJRef as $pj) {
            $json = array_merge($json,$pj->getJson());
        }
        $json = ORMCCommun::addJsonXmlElement($json,"NumeroFacture",["V"=>$this->numeroFacture]);
        $json = ORMCCommun::addJsonXmlElement($json,"NumeroMarche",["V"=>$this->numeroMarche]);
        $json = ORMCCommun::addJsonXmlElement($json,"NumeroEngagement",["V"=>$this->numeroEngagement]);
        $json = ORMCCommun::addJsonXmlElement($json,"CodeService",["V"=>$this->codeService]);
        $json = ORMCCommun::addJsonXmlElement($json,"NomService",["V"=>$this->nomService]);
        return ORMCCommun::addJsonXmlElement([],"BlocPiece",[],$json);
    }
}