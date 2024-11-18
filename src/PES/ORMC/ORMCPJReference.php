<?php

namespace App\Service\ORMC;


/**
 * Pour chaque PJ associée à l'objet, référence unique de la PJ.
 */
class ORMCPJReference
{

    /**
     * @param string $support 
     * Précise la forme de l'élément référencé.
     * Si absence en PJ Ref rejet du flux complet .
     * Les valeurs 02 ou 03 interdisent d'avoir un bloc PJ.
     *  - `01` : Support électronique.
     *  - `02` : Support papier.
     *  - `03` : Support cdrom/dvdrom.
     * @param string $idUnique
     * Identifiant unique de la pièce pour la CEPL quel que soit le domaine, l'objet comptable, l'exercice et le budget concerné.
     * Si absence en PJ Ref rejet du flux.
     * @param ?string $nomPJ
     * 	Nom de la PJ sur 100 caractères maximum – optionnel, destiné à préciser le référencement de PJ non électronique (i.e. qui ne sont pas "en ligne").
     * @param ?string $typePJ
     * Type de la pièce référencée.
     * Pour un titre ORMC dont la balise Edition est valorisé à « 06 »  (Avis des sommes à payer ORMC ENSU à éditer) :
     * - la PJ de type « 010 » (Facture ASAP ORMC ENSU à éditer) doit être véhiculée dans un bloc PJ Reference avec son type afin qu'Hélios puisse identifier de façon explicite la PJ devant servir de facture. Il n'y a pas de rejet dans le guichet mais toutefois le comptable ne pourra pas enregistrer l'article de rôle correspondant.
     * - l'éventuelle PJ de type « 011 » (Document complémentaire à l'ASAP ENSU à éditer) devant être fusionné à la facture doit être véhiculée dans un bloc PJ Reference avec son type afin qu'Hélios puisse identifier de façon explicite cette PJ.
     * Pour un titre dont la balise Edition est valorisé à 01 (Avis des sommes à payer à éditer) ou 05 (Avis des sommes à payer Patients à éditer)
     * - l'éventuelle PJ de type « 011 » (Document complémentaire à l'ASAP ENSU à éditer) devant être fusionné avec la facture doit être véhiculée dans un bloc PJ Reference avec son type afin qu'Hélios puisse identifier de façon explicite cette PJ.
     * Pour les autres contextes, la balise est facultative.
     *  - `001` : Document Budgétaire.
     *  - `002` : Recette.
     *  - `003` : Dépense.
     *  - `004` : Etat de Paye.
     *  - `005` : Etat d'Aide sociale.
     *  - `006` : PES Facture.
     *  - `007` : Facture ORMC CPP
     *  - `008` : Document complémentaire à l'ASAP CPP
     *  - `009` : Pièce contractuelle Marché
     *  - `010` : Facture ASAP ORMC ENSU à éditer
     *  - `011` : Document complémentaire à l'ASAP ENSU à éditer
     *  - `012` : CFU état ordonnateur
     *  - `013` : CFU états annexes
     */
    public function __construct(private string $support,private string $idUnique,private ?string $nomPJ = null,private ?string $typePJ = null){}

    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = ORMCCommun::addJsonXmlElement($json,"Support",["V"=>$this->support]);
        $json = ORMCCommun::addJsonXmlElement($json,"IdUnique",["V"=>$this->idUnique]);
        $json = ORMCCommun::addJsonXmlElement($json,"NomPJ",["V"=>$this->nomPJ]);
        $json = ORMCCommun::addJsonXmlElement($json,"TypePJ",["V"=>$this->typePJ]);
        return ORMCCommun::addJsonXmlElement([],"PJRef",[],$json);
    }
}