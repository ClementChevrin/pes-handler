<?php

namespace App\PES\Assert;

use App\PES\Assert\Lenght;
use App\PES\Assert\AssertInterface;

/**
 * Factory pour créer les validateurs selon les types PES
 */
class AssertFactory
{
    #region [Constante de type]
    // Types Alphanum
    public const TYPE_ALPHANUM1 = "Base_Alphanum1";
    public const TYPE_ALPHANUM1_LIGHT = "Base_Alphanum1_Light";
    public const TYPE_ALPHANUM2 = "Base_Alphanum2";
    public const TYPE_ALPHANUM2_LIGHT = "Base_Alphanum2_Light";
    public const TYPE_ALPHANUM3 = "Base_Alphanum3";
    public const TYPE_ALPHANUM5 = "Base_Alphanum5";
    public const TYPE_ALPHANUM5_LIGHT = "Base_Alphanum5_Light";
    public const TYPE_ALPHANUM6 = "Base_Alphanum6";
    public const TYPE_ALPHANUM9_LIGHT = "Base_Alphanum9_Light";
    public const TYPE_ALPHANUM10 = "Base_Alphanum10";
    public const TYPE_ALPHANUM11 = "Base_Alphanum11";
    public const TYPE_ALPHANUM12 = "Base_Alphanum12";
    public const TYPE_ALPHANUM13 = "Base_Alphanum13";
    public const TYPE_ALPHANUM14 = "Base_Alphanum14";
    public const TYPE_ALPHANUM15 = "Base_Alphanum15";
    public const TYPE_ALPHANUM16 = "Base_Alphanum16";
    public const TYPE_ALPHANUM17 = "Base_Alphanum17";
    public const TYPE_ALPHANUM18 = "Base_Alphanum18";
    public const TYPE_ALPHANUM20 = "Base_Alphanum20";
    public const TYPE_ALPHANUM20_LIGHT = "Base_Alphanum20_Light";
    public const TYPE_ALPHANUM25 = "Base_Alphanum25";
    public const TYPE_ALPHANUM30 = "Base_Alphanum30";
    public const TYPE_ALPHANUM34 = "Base_Alphanum34";
    public const TYPE_ALPHANUM35 = "Base_Alphanum35";
    public const TYPE_ALPHANUM50 = "Base_Alphanum50";
    public const TYPE_ALPHANUM50_LIGHT = "Base_Alphanum50_Light";
    public const TYPE_ALPHANUM70 = "Base_Alphanum70";
    public const TYPE_ALPHANUM80 = "Base_Alphanum80";
    public const TYPE_ALPHANUM100 = "Base_Alphanum100";
    public const TYPE_ALPHANUM140 = "Base_Alphanum140";
    public const TYPE_ALPHANUM250 = "Base_Alphanum250";

    // Types Num
    public const TYPE_NUM1 = "Base_Num1";
    public const TYPE_NUM1_LIGHT = "Base_Num1_Light";
    public const TYPE_NUM2 = "Base_Num2";
    public const TYPE_NUM2_2 = "Base_Num2_2";
    public const TYPE_NUM2_LIGHT = "Base_Num2_Light";
    public const TYPE_NUM2_2LIGHT = "Base_Num2_2Light";
    public const TYPE_NUM3 = "Base_Num3";
    public const TYPE_NUM3_LIGHT = "Base_Num3_Light";
    public const TYPE_NUM4 = "Base_Num4";
    public const TYPE_NUM4_LIGHT = "Base_Num4_Light";
    public const TYPE_NUM5 = "Base_Num5";
    public const TYPE_NUM5_LIGHT = "Base_Num5_Light";
    public const TYPE_NUM6 = "Base_Num6";
    public const TYPE_NUM6_LIGHT = "Base_Num6_Light";
    public const TYPE_NUM6_NONVIDE = "Base_Num6_NonVide";
    public const TYPE_NUM7 = "Base_Num7";
    public const TYPE_NUM7_LIGHT = "Base_Num7_Light";
    public const TYPE_NUM8 = "Base_Num8";
    public const TYPE_NUM8_NUM1 = "Base_Num8_Num1";
    public const TYPE_NUM9 = "Base_Num9";
    public const TYPE_NUM9_LIGHT = "Base_Num9_Light";
    public const TYPE_NUM10 = "Base_Num10";
    public const TYPE_NUM10_LIGHT = "Base_Num10_Light";
    public const TYPE_NUM12 = "Base_Num12";
    public const TYPE_NUM13 = "Base_Num13";
    public const TYPE_NUM13_LIGHT = "Base_Num13_Light";
    public const TYPE_NUM14 = "Base_Num14";
    public const TYPE_NUM14_LIGHT = "Base_Num14_Light";
    public const TYPE_NUM14_14_LIGHT = "Base_Num14_14_Light";
    public const TYPE_NUM15 = "Base_Num15";
    public const TYPE_NUM16 = "Base_Num16";
    public const TYPE_NUM17 = "Base_Num17";
    public const TYPE_NUM20 = "Base_Num20";
    public const TYPE_NUM20_LIGHT = "Base_Num20_Light";
    public const TYPE_NUM25 = "Base_Num25";

    // Types Texte
    public const TYPE_TEXTE2 = "Base_Texte2";
    public const TYPE_TEXTE2_3 = "Base_Texte2_3";
    public const TYPE_TEXTE3 = "Base_Texte3";
    public const TYPE_TEXTE5 = "Base_Texte5";
    public const TYPE_TEXTE5_14 = "Base_Texte5_14";
    public const TYPE_TEXTE5_LONGUEUR5 = "Base_Texte5_Longueur5";
    public const TYPE_TEXTE6 = "Base_Texte6";
    public const TYPE_TEXTE10 = "Base_Texte10";
    public const TYPE_TEXTE11 = "Base_Texte11";
    public const TYPE_TEXTE11BIC = "Base_Texte11BIC";
    public const TYPE_TEXTE12 = "Base_Texte12";
    public const TYPE_TEXTE14 = "Base_Texte14";
    public const TYPE_TEXTE15 = "Base_Texte15";
    public const TYPE_TEXTE16 = "Base_Texte16";
    public const TYPE_TEXTE18_LIGHT = "Base_Texte18_Light";
    public const TYPE_TEXTE20 = "Base_Texte20";
    public const TYPE_TEXTE20_LIGHT = "Base_Texte20_Light";
    public const TYPE_TEXTE24 = "Base_Texte24";
    public const TYPE_TEXTE25 = "Base_Texte25";
    public const TYPE_TEXTE27 = "Base_Texte27";
    public const TYPE_TEXTE30 = "Base_Texte30";
    public const TYPE_TEXTE32 = "Base_Texte32";
    public const TYPE_TEXTE34 = "Base_Texte34";
    public const TYPE_TEXTE34IBAN = "Base_Texte34IBAN";
    public const TYPE_TEXTE35 = "Base_Texte35";
    public const TYPE_TEXTE35SEPA = "Base_Texte35SEPA";
    public const TYPE_TEXTE38 = "Base_Texte38";
    public const TYPE_TEXTE50 = "Base_Texte50";
    public const TYPE_TEXTE64 = "Base_Texte64";
    public const TYPE_TEXTE70 = "Base_Texte70";
    public const TYPE_TEXTE70SEPA = "Base_Texte70SEPA";
    public const TYPE_TEXTE100 = "Base_Texte100";
    public const TYPE_TEXTE100_LIGHT = "Base_Texte100_Light";
    public const TYPE_TEXTE140 = "Base_Texte140";
    public const TYPE_TEXTE140SEPA = "Base_Texte140SEPA";
    public const TYPE_TEXTE160 = "Base_Texte160";
    public const TYPE_TEXTE160_LIGHT = "Base_Texte160_Light";
    public const TYPE_TEXTE200 = "Base_Texte200";
    public const TYPE_TEXTE250 = "Base_Texte250";
    public const TYPE_TEXTE256 = "Base_Texte256";
    public const TYPE_TEXTE420 = "Base_Texte420";
    public const TYPE_TEXTE500 = "Base_Texte500";
    public const TYPE_TEXTE500_LIGHT = "Base_Texte500_Light";

    // Types spéciaux
    public const TYPE_ANNEE = "Base_Annee";
    public const TYPE_BOOLEEN = "Base_Booleen";
    public const TYPE_CODEBUD2 = "Base_CodeBud2";
    public const TYPE_CODECOL3 = "Base_CodeCol3";
    public const TYPE_DATE = "Base_Date";
    public const TYPE_DATEMOISANNEE = "Base_DateMoisAnnee";
    public const TYPE_DECIMAL14_4 = "Base_Decimal14_4";
    public const TYPE_ENTIER3_RELATIF = "Base_Entier3_Relatif";
    public const TYPE_IDENTIFIANTPJ20 = "Base_IdentifiantPJ20";
    public const TYPE_MONTANT = "Base_Montant";
    public const TYPE_MONTANT_LIGHT = "Base_Montant_Light";
    public const TYPE_MONTANT_RELATIF = "Base_Montant_Relatif";
    public const TYPE_NOMPJ = "Base_NomPJ";
    public const TYPE_QUANTITE = "Base_Quantite";
    public const TYPE_TAUX = "Base_Taux";
    public const TYPE_TAUX_HIGHT = "Base_Taux_Hight";
    public const TYPE_TAUX_LIGHT = "Base_Taux_Light";

    // Types Texte spéciaux
    public const TYPE_TEXTE_CODECOMMUNE_2_3 = "Base_Texte_CodeCommune_2_3";
    public const TYPE_TEXTE_CODEDEPARTEMENT_2_3 = "Base_Texte_CodeDepartement_2_3";
    public const TYPE_TEXTE_CODEINSEEPAYS_5 = "Base_Texte_CodeInseePays_5";
    public const TYPE_TEXTE_CODEPAYS_3 = "Base_Texte_CodePays_3";
    public const TYPE_TEXTE_LIBELLE_NAISSANCE_70 = "Base_Texte_Libelle_Naissance_70";
    public const TYPE_TEXTECODIQUE7 = "Base_TexteCodique7";
    public const TYPE_NUM60TALONOPTIQUE = "Base_Num60TalonOptique";

    // Types de base
    public const TYPE_BASEALPHANUM = "V_BaseAlphanum";
    public const TYPE_BASESTRING = "V_BaseString";
    #endregion


    /**
     * Crée un validateur pour le type Base_Alphanum* 
     */
    private static function createBaseTexte(string $value, int $min, int $max): AssertInterface
    {
        $validator = new Lenght($value);
        $validator
            ->setMin($min)
            ->setMax($max);
        return $validator;
    }

    /**
     * Crée un validateur pour les types spécifiques
     */
    private static function createFromType(string $type, mixed $value): AssertInterface
    {
        return match($type) {
            self::TYPE_TEXTE100 => self::createBaseTexte($value, 1,100),
            default => throw new \InvalidArgumentException("Type inconnu: $type") 
        };
    }

    public static function checkFromType(string $type, mixed $value) : void {
        $validator = self::createFromType($type,$value);
        $validator->verify();
    }
}
