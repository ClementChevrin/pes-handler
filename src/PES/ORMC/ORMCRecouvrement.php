<?php

namespace App\Service\ORMC;

class ORMCRecouvrement
{
    /**
     * @param string $typFlux
     * Type de flux. Cette zone permet d'indiquer l'origine (information aller) ou la destination (information retour) du recouvrement.
     *  - Information retour : Informations des recouvrements à destination de l'ordonnateur (code 01)
     *  - Information aller : Information d'encaissement en provenance d'un centre d'encaissement( code 02).Le code 02 est uniquement à usage interne et n'a pas à être utilisé par les ordonnateurs.
     * 
     * Enumération avec les valeurs suivantes :
     *  - `01` : Informations des recouvrements à destination de l'ordonnateur.
     *  - `02` : Information d'encaissement en provenance d'un centre d'encaissement.
     * 
     * Le code 02 est uniquement à usage interne et n'a pas à être utilisé par les ordonnateurs.
     * @param string $modRegl
     * Code indiquant le moyen de règlement utilisé par le débiteur.
     * 
     * Enumération avec les valeurs suivantes :
     *  - `01` : Numéraire
     *  - `02` : Chèque
     *  - `03` : Virement
     *  - `04` : Virement appli externe
     *  - `05` : Virement gros montant
     *  - `06` : Virement à l'étranger
     *  - `07` : Opération budget rattaché
     *  - `08` : Prélèvement
     *  - `09` : Virement interne
     * 
     * @param string $dteReco Date du recouvrement chez le comptable.
     * 
     * @param string $idEncaissement Identifiant métier de l'encaissement.Cet identifiant concerne un encaissement portant sur une ligne de pièce.
     * 
     * @param string $mtReco Montant de l'encaissement réalisé au niveau de la ligne de pièce.
     * 
     */
    public function __construct(private string $typFlux,private string $modRegl,private string $dteReco,private string $idEncaissement,private string $mtReco){}
    
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"TypFlux",["V"=>$this->typFlux]);
        $json = ORMCCommun::addJsonXmlElement($json,"ModRegl",["V"=>$this->modRegl]);
        $json = ORMCCommun::addJsonXmlElement($json,"DteReco",["V"=>$this->dteReco]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdEncaissement",["V"=>$this->idEncaissement]);
        $json = ORMCCommun::addJsonXmlElement($json,"MtReco",["V"=>$this->mtReco]);
        return ORMCCommun::addJsonXmlElement([],"Recouvrement",[],$json);
    }
}