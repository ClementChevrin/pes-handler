<?php

namespace App\Service\ORMC;

/**
 * L'enveloppe contient les éléments d'identification du flux (fichier, émetteur et récepteur).
 */
class ORMCEnveloppe
{
    /**
     * @param ORMCParametres $parametres Caractéristiques du fichier.
     * @param ORMCEmetteur $emetteur Carte de visite du partenaire émetteur.
     * @param ?ORMCRecepteur $recepteur Carte de visite du partenaire récepteur.
     */
    public function __construct(private ORMCParametres $parametres,private ORMCEmetteur $emetteur,private ?ORMCRecepteur $recepteur = null){}
    
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = array_merge($json,$this->parametres->getJson());
        $json = array_merge($json,$this->emetteur->getJson());
        if ($this->recepteur) {
            $json = array_merge($json,$this->recepteur->getJson());
        }
        return ORMCCommun::addJsonXmlElement([],"Enveloppe",[],$json);
    }
}