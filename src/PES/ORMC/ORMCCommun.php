<?php

namespace App\Service\ORMC;

class ORMCCommun
{

    public function __construct(private ORMCEnveloppe $enveloppe,private ORMCEnTetePES $enTetePES,private ORMCPES_RecetteAller $pes){}
    public static function addJsonXmlElement(array $json,string $tag,array $value = [],array $children = []): array
    {
        $newValue = [];
        foreach ($value as $key => $value) {
            if($value!=null)
            {
                $newValue[$key] = $value;
            }
        }
        $json = array_merge($json,[           
            [
                "#tag" => $tag, 
                "#attribut" => $newValue,
                "#children" => ($children)?$children:[],
            ],
        ]);
        return $json;
    } 
}