<?php

namespace App\Service\ORMC;

class ORMCBlocLignePiece
{
    public function __construct(private ORMCInfoLignePiece $infoLignePiece,private ORMCInfoPrelevement|ORMCInfoPrelementSEPA|null $infoPrelevement = null,private ORMCInfoAssure|null $infoAssure = null,private ORMCRattachPiece|null $rattachPiece = null,private ORMCLiensIdent|null $liensIdent = null){}
    /**
     * @return array Renvoie la liste des propriétés sous format Json
     */
    public function getJson() : array
    {
        $json = [];
        $json = array_merge($json,$this->infoLignePiece->getJson());
        if ($this->infoPrelevement) {
            $json = array_merge($json,$this->infoPrelevement->getJson());
        }
        if ($this->infoAssure) {
            $json = array_merge($json,$this->infoAssure->getJson());
        }
        if ($this->rattachPiece) {
            $json = array_merge($json,$this->rattachPiece->getJson());
        }
        if ($this->liensIdent) {
            $json = array_merge($json,$this->liensIdent->getJson());
        }
        return ORMCCommun::addJsonXmlElement([],"BlocLignePiece",[],$json);
    }
}