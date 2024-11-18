<?php

namespace App\Service\ORMC;

use App\Service\ORMC\ORMCSchema;
use App\Service\XSD\XSDSchema;
use DOMAttr;
use DOMDocument;
use DOMElement;
use phpDocumentor\Reflection\Types\Null_;

class ORMCPES_Aller
{
    // Document XML de flux ORMC
    private DOMDocument $dom;
    // Flux ORMC au format JSON
    private array $content;
    // Source diverse d'information que l'on souhaite garder dans un flux sans les rendre visibles
    private array|null $src;
    /**
     * Crée un flux ORMC.
     * @param string $name Nom du fichier du flux généré
     * @param ORMCEnveloppe $enveloppe Enveloppe du flux
     * @param ORMCEnTetePES $enTetePES EnTetePES du flux
     * @param ORMCPES_RecetteAller $pes Le contenu du PES
     * @param array $src Source diverse pouvant être utilisées plus tard, est vide par défaut
     */
    public function __construct(string $name, ORMCEnveloppe $enveloppe, ORMCEnTetePES $enTetePES, ORMCPES_RecetteAller $pes, array $src = null)
    {
        $this->src = $src;
        $this->dom = new DOMDocument("1.0", "ISO-8859-1");
        $this->dom->formatOutput = true;

        $root = $this->dom->createElement("n:PES_Aller");
        $root->setAttribute("xmlns:n", "http://www.minefi.gouv.fr/cp/helios/pes_v2/Rev0/aller");
        $root->setAttribute("xmlns:ns2", "http://www.w3.org/2001/04/xmlenc#");
        $root->setAttribute("xmlns:ns3", "http://www.w3.org/2000/09/xmldsig#");
        $root->setAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");
        $root->setAttribute("Id", $name);
        $root->setAttribute("xsi:schemaLocation", "http://www.minefi.gouv.fr/cp/helios/pes_v2/Rev0/aller C:\Schemas_XSD_PES_P421\Schemas_PES\PES_V2\Rev0\PES_Aller.xsd");

        $this->content = array_merge($enveloppe->getJson(), $enTetePES->getJson(), $pes->getJson());
        foreach ($this->content as $ar) {
            $domElement = $this->addChild($ar);
            if ($domElement) {
                $root->appendChild($domElement);
            }
        }
        $this->dom->appendChild($root);
    }

    /**
     * Sauvegarde l'arbre interne XML dans un fichier
     * @param string $path Le chemin où sera sauvegardé le document XML (le nom de fichier est généré automatiquement).
     * @param int|null $options Options additionnelles. Actuellement, seul LIBXML_NOEMPTYTAG est supporté.
     * @return bool|int le nombre d'octets écrit ou true si une erreur survient.
     */
    public function save(string $path, int|null $options = 0): bool|int
    {
        return $this->dom->save($path . ($this->dom->getElementsByTagName("NomFic")->item(0)->attributes->item(0)->nodeValue), $options);
    }

    /**
     * Permet de vérifier la validité d'un document XML en fonction d'une XSDSchema.
     * @param XSDSchema $schema XSD de validation 
     * @return `true` si aucune exception n'a été rencontré ou `false` si il y a eu une erreur d'execution.
     */
    public function validation(XSDSchema $schema): bool
    {
        return $schema->validation($this->dom);
    }

    /**
     * Retourne le flux ORMC au format string
     * @return string Chaine de la dom ORMC
     */
    public function toString(): string
    {
        $this->dom->preserveWhiteSpace = false;
        $this->dom->formatOutput = false;
        $stringXml = str_replace(array("\n", "\t", "\r"), '', $this->dom->saveXML());
        $this->dom->preserveWhiteSpace = true;
        $this->dom->formatOutput = true;
        return $stringXml;
    }

    /**
     * Renvoie les sources fournie pendant la création du flux.
     * @return array|null Renvoie les éventuelles sources fournie
     */
    public function getSrc(): array|null
    {
        return $this->src;
    }


    private function addChild(array $node): DOMElement|null
    {
        if (!(empty($node["#attribut"]) && empty($node["#children"]))) {
            $element = $this->dom->createElement($node["#tag"]);
            foreach ($node["#attribut"] as $attr => $value) {
                $element->setAttributeNode(new DOMAttr($attr, $this->removeAccent($value)));
            }
            foreach ($node["#children"] as $child) {
                $elementResult = $this->addChild($child);
                if ($elementResult) {
                    $element->appendChild($elementResult);
                }
            }
            return $element;
        }
        return null;
    }
    private function removeAccent(string $text): string
    {
        $caracteres_accentues = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', '×', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'Þ', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', '÷', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'þ', 'ÿ');
        $caracteres_non_accentues = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'x', 'O', 'U', 'U', 'U', 'U', 'Y', 'TH', 'SS', 'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'DIV', 'O', 'U', 'U', 'U', 'U', 'Y', 'TH', 'Y');
        return strtr($text, array_combine($caracteres_accentues, $caracteres_non_accentues));
    }
}
