<?php

namespace App\Service\ORMC;

use App\Service\XSD\XSDAttribut;
use App\Service\XSD\XSDChildren;
use App\Service\XSD\XSDConstraint;
use App\Service\XSD\XSDProperties;
use App\Service\XSD\XSDSchema;

/**
 * Défini des schémas XML PES V2
 */
class ORMCSchema
{
    #region Base
    public const Base_AlphaNum = "/^[0-9a-zA-Z]*$/m";
    public const Base_BIC = "/^([A-Z]{6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1})$/m";
    public const Base_Booleen = "/^(1{1})|(0{1})$/m";
    public const Base_CatTiers = "/^(01)|(2[0-9])|(50)|(6[0-5])|(7[0-4])$/m";
    public const Base_CodBud2 = "/^[0-9A-Z][0-9]$/m";
    public const Base_Date = "/^\d{4}-\d{2}-\d{2}$/m";
    public const Base_IBAN = "/^[A-Z]{2,2}[0-9]{2,2}[a-zA-Z0-9]{1,30}$/m";
    public const Base_Id = "/^ID[0-9]+$/m";
    public const Base_IdPce = "/^[1-9][0-9]{0,7}$/m";
    public const Base_Montant = "/^[0-9]{1,12}\.[0-9]{2}$/m";
    public const Base_NatJur = "/^(0[1-9])|(1[0-1])$/m";
    public const Base_NatPce = "/^(0[1-9])|(1([0-1]|8))$/m";
    public const Base_NatPrel = "/^0[1-2]$/m";
    public const Base_Nature = "/^588$/m";
    public const Base_Num = "/^[0-9]*$/m";
    public const Base_Num_IdLigne = "/^[1-9][0-9]{0,5}$/m";
    public const Base_Num_NbrPce = "/^[1-9][0-9]{0,4}$/m";
    public const Base_PerPrel = "/^0[1-7]$/m";
    public const Base_SequencePres = "/^0[1-4]$/m";
    public const Base_Texte = "/^([a-zA-Z]?[0-9]?-? ?)*$/m";
    public const Base_TexteSEPA = "/^[0-9a-zA-Z\/?:()\., \-+']+$/m";
    public const Base_TypAdr = "/^[0-2]$/m";
    public const Base_TypPce = "/^(0([1-7]|9))|(1([0-2]|[4-5]))$/m";
    public const Base_TypTiers = "/^(0[1-7])|(1[0-5])|(2[0-6])|(30)$/m";
    public const Base_Type_BordAller = "/^(0[1-3])|(06)$/m";
    public const Base_Type_File = "/^(PESORMC)|(PESALR1)$/m";
    public const Base_XML_File = "/^(([a-zA-Z]?[0-9]?){1,96}\.xml)$/m";
    #endregion
    public static function getPES_RecetteAller():XSDSchema
    {
        return new XSDSchema([
            "xml"=>new XSDProperties(
                new XSDAttribut([
                    "version"=>new XSDConstraint(3,3,"/1.0/m","Indique la version de votre flux ORMC (mettre comme valeur 1.0)"),
                    "encoding"=>new XSDConstraint(10,10,"/ISO-8859-1/m","Indique l'encodage' de votre flux ORMC (mettre comme valeur ISO-8859-1)"),
                ])
            ),
            "n:PES_Aller"=>new XSDProperties(
                new XSDAttribut([
                    "xmlns:n"=>new XSDConstraint(1,53,"/http:\/\/www\.minefi\.gouv\.fr\/cp\/helios\/pes_v2\/Rev0\/aller/","Espace de noms 'n' de votre flux ORMC (mettre comme valeur http://www.minefi.gouv.fr/cp/helios/pes_v2/Rev0/aller)"), 
                    "xmlns:ns2"=>new XSDConstraint(1,33,"/http:\/\/www\.w3\.org\/2001\/04\/xmlenc#/","Espace de noms 'ns2' de votre flux ORMC (mettre comme valeur http://www.w3.org/2001/04/xmlenc#)"),
                    "xmlns:ns3"=>new XSDConstraint(1,34,"/http:\/\/www\.w3\.org\/2000\/09\/xmldsig#/","Espace de noms 'ns3' de votre flux ORMC (mettre comme valeur http://www.w3.org/2000/09/xmldsig#)"),
                    "xmlns:xsi"=>new XSDConstraint(1,41,"/http:\/\/www\.w3\.org\/2001\/XMLSchema-instance/","Espace de noms 'xsi' de votre flux ORMC (mettre comme valeur http://www.w3.org/2001/XMLSchema-instance)"),
                    "Id"=>new XSDConstraint(5,21,ORMCSchema::Base_XML_File,"Nom de votre flux ORMC (fichier.xml)"),
                    //"xsi:schemaLocation"=>new XSDConstraint(0,115,"/http:\/\/www\.minefi\.gouv\.fr\/cp\/helios\/pes_v2\/Rev0\/aller C:\\Schemas_XSD_PES_P421\\Schemas_PES\\PES_V2\\Rev0\\PES_Aller\.xsd/m","Nom de votre flux ORMC (mettre comme valeur http://www.minefi.gouv.fr/cp/helios/pes_v2/Rev0/aller C:\Schemas_XSD_PES_P421\Schemas_PES\PES_V2\Rev0\PES_Aller.xsd)")
                ]),
                new XSDChildren([
                    "Enveloppe"=>new XSDProperties(
                        new XSDChildren([
                            "Parametres"=>new XSDProperties(
                                new XSDChildren([
                                    "Version"=>new XSDProperties(
                                        new XSDAttribut([
                                            "V"=>new XSDConstraint(1,1,ORMCSchema::Base_Num,"Numéro de version du message. Ce numéro est relatif à l'enveloppe. Doit être valorisé à 2."),
                                        ]),
                                    ),
                                    "TypFic"=>new XSDProperties(
                                        new XSDAttribut([
                                            "V"=>new XSDConstraint(7,7,ORMCSchema::Base_Type_File,"Code du type de fichier :\n- PESALR1 pour le PES_Aller\n- PESORMC pour l'ORMC"),
                                        ]),
                                    ),
                                    "NomFic"=>new XSDProperties(
                                        new XSDAttribut([
                                            "V"=>new XSDConstraint(5,100,ORMCSchema::Base_XML_File,"Nom du fichier (fichier.xml)."),
                                        ]),
                                    ),
                                ]),
                            ),
                            "Emetteur"=>new XSDProperties(
                                new XSDChildren([
                                    "Sigle"=>new XSDProperties(
                                        new XSDAttribut([
                                            "V"=>new XSDConstraint(1,32,ORMCSchema::Base_Texte,"Nom de l'éditeur émetteur du flux"),
                                        ]),
                                    ),
                                    "Adresse"=>new XSDProperties(
                                        new XSDAttribut([
                                            "V"=>new XSDConstraint(1,38,ORMCSchema::Base_Texte,"Nom et version de l'application"),
                                        ]),
                                    ),
                                ]),
                            ),
                            "Recepteur"=>new XSDProperties(
                                new XSDChildren([
                                    "Sigle"=>new XSDProperties(
                                        new XSDAttribut([
                                            "V"=>new XSDConstraint(1,32,ORMCSchema::Base_Texte,"Nom du récepteur du flux"),
                                        ]),
                                    ),
                                    "Adresse"=>new XSDProperties(
                                        new XSDAttribut([
                                            "V"=>new XSDConstraint(1,38,ORMCSchema::Base_Texte,"Adresse du récepteur du flux"),
                                        ]),
                                    ),
                                ]),
                            ),
                        ]),
                    ),
                    "EnTetePES"=>new XSDProperties(
                        new XSDChildren([
                            "DteStr"=>new XSDProperties(
                                new XSDAttribut([
                                    "V"=>new XSDConstraint(10,10,ORMCSchema::Base_Date,"Date d'émission de la structure."),
                                ]),
                            ),
                            "IdPost"=>new XSDProperties(
                                new XSDAttribut([
                                    "V"=>new XSDConstraint(6,7,ORMCSchema::Base_Num,"Identification permanente du poste comptable (numéro codique). Le codique doit être sur 6 à 7 chiffres ou il doit commercer par 02A, 02B suivi de 3 à 4 chiffres. Les lettres doivent être en majuscule.\nLe poste doit exister dans Hélios.\nValorisation erronée = rejet du flux"),
                                ]),
                            ),
                            "IdColl"=>new XSDProperties(
                                new XSDAttribut([
                                    "V"=>new XSDConstraint(14,14,ORMCSchema::Base_Num,"Identification numérique permanente du budget collectivité / Identifiant national Siret."),
                                ]),
                            ),
                            "CodCol"=>new XSDProperties(
                                new XSDAttribut([
                                    "V"=>new XSDConstraint(3,3,ORMCSchema::Base_Num,"Code collectivité. : identification de la collectivité ou du budget collectivité.\nLe budget doit exister dans le poste et ne doit être ni inactif , ni dissous."),
                                ]),
                            ),
                            "CodBud"=>new XSDProperties(
                                new XSDAttribut([
                                    "V"=>new XSDConstraint(2,2,ORMCSchema::Base_CodBud2,"Code budget.\nLe budget doit exister dans le poste et ne doit être ni inactif , ni dissous."),
                                ]),
                            ),
                            "LibelleColBud"=>new XSDProperties(
                                new XSDAttribut([
                                    "V"=>new XSDConstraint(1,38,ORMCSchema::Base_Texte,"Libellé du budget collectivité."),
                                ]),
                            ),
                        ]),
                    ),
                    "PES_RecetteAller"=>new XSDProperties(
                        new XSDChildren([
                            "EnTeteRecette"=>new XSDProperties(
                                new XSDChildren([
                                    "IdVer"=>new XSDProperties(
                                        new XSDAttribut([
                                            "V"=>new XSDConstraint(1,1,ORMCSchema::Base_Num,"N° de version du PES recette. – Mettre à « 2 ». A défaut rejet du flux."),
                                        ]),
                                    ),
                                    "InfoDematerialisee"=>new XSDProperties(
                                        new XSDAttribut([
                                            "V"=>new XSDConstraint(1,1,ORMCSchema::Base_Booleen,"Précise si les blocs recette véhiculent des bordereaux & mandats dématérialisées (1) ou non (0).\nLa valeur (0) n'empêche pas de communiquer des pièces justificatives dématérialisées et leurs références (PJRef)\nSi non présent considéré à '0'\nLa valeur 1 ne peut être autorisée qu'avec une signature électronique. Si valeur= 1 et absence de signature électronique, rejet du flux.\nLa valeur 0 et la présence d'une signature électronique aboutissent au rejet du flux."),
                                        ]),
                                    ),
                                ]),
                            ),
                            "Bordereau"=> new XSDProperties(
                                new XSDAttribut([
                                    "Id"=>new XSDConstraint(3,20,ORMCSchema::Base_Id,"Obligatoire si dématérialisation.\nFournit la référence pour la signature électronique du bordereau.\nDoit être unique dans le fichier XML."),
                                ]),
                                new XSDChildren([
                                    "BlocBordereau"=>new XSDProperties(
                                        new XSDChildren([
                                            "Exer"=>new XSDProperties(
                                                new XSDAttribut([
                                                    "V"=>new XSDConstraint(4,4,ORMCSchema::Base_Num,"Millésime de l'exercice de rattachement budgétaire."),
                                                ]),
                                            ),
                                            "IdBord"=>new XSDProperties(
                                                new XSDAttribut([
                                                    "V"=>new XSDConstraint(7,7,ORMCSchema::Base_Num,"Identifiant du bordereau récapitulatif de titres de recette.\nLe numéro de bordereau est unique par exercice et par type de bordereau pour un budget collectivité. Un contrôle de séquentialité du numéro est effectué. Si le numéro est déjà connu dans Hélios ou les boîtes après la vérification du schéma, rejet du bordereau pour cause de doublon.\nPour un bordereau de type ORMC (Ordre de Recette Multi Créanciers) IdBord correspondra au numéro de rôle dans Hélios ; le numéro de rôle est unique par exercice et par type de rôle pour un budget collectivité."),
                                                ]),
                                            ),
                                            "DteBordEm"=>new XSDProperties(
                                                new XSDAttribut([
                                                    "V"=>new XSDConstraint(10,10,ORMCSchema::Base_Date,"Date à laquelle le bordereau est émis par l'ordonnateur.\nElle est obligatoire dans le PES recette aller et le format doit être respecté sinon rejet du flux.\nPour un bordereau de type ORMC DteBordE correspondra à la DateEmission du rôle dans Hélios."),
                                                ]),
                                            ),
                                            "TypBord"=>new XSDProperties(
                                                new XSDAttribut([
                                                    "V"=>new XSDConstraint(2,2,ORMCSchema::Base_Type_BordAller,"Informations destinées à déterminer le type de bordereau transmis par l'ordonnateur.\nA utiliser en fonction du TypPce et de NatPce\nLes types 01 02 sont ceux utilisés dans Hélios et pour lesquels les éditeurs au PESV2 ont réalisé les développements.\nLe type 04 ne fonctionne pas en PES Aller : s'il est utilisé , rejet du bordereau.\nToute valeur différente de celles prévues= rejet du flux.\n - 01 : Ordinaire\n - 02 : Annulation/réduction\n - 03 : Ordres de recette\n - 06 : Ordres de recette multi créanciers (ORMC)"),
                                                ]),
                                            ),
                                            "NbrPce"=>new XSDProperties(
                                                new XSDAttribut([
                                                    "V"=>new XSDConstraint(1,5,ORMCSchema::Base_Num_NbrPce,"Nombre total de pièces véhiculées par le bordereau.\nIl est forcément supérieur ou égal à 1 sinon rejet du flux."),
                                                ]),
                                            ),
                                            "MtBordHt"=>new XSDProperties(
                                                new XSDAttribut([
                                                    "V"=>new XSDConstraint(4,15,ORMCSchema::Base_Montant,"Montant HT du bordereau.\nObligatoire dans le PES recette avec ou sans signature.\nDoit être >0,00 sinon rejet du flux.\nPour un bordereau de type BORDEREAU _ORMC, le MontantHt du rôle correspond à la somme des montants Ht des lignes de titre ORMC."),
                                                ]),
                                            ),
                                            "MtBordTVA"=>new XSDProperties(
                                                new XSDAttribut([
                                                    "V"=>new XSDConstraint(4,15,ORMCSchema::Base_Montant,"Montant TVA du bordereau.\nZone à remplir si TVA, montant à 0 aboutit à rejet du bordereau si la balise est présente.\nSi un montant est saisi donc supérieur à 0,00, au moins une Ligne de Piece du Bordereau doit comporter une balise MtTVA, servie avec un montant supérieur à 0,00. Sinon rejet du bordereau\nPour un bordereau de type BORDEREAU_ORMC, le MontantTva du rôle correspond à la somme des montants TVA des lignes de titres ORMC."),
                                                ]),
                                            ),
                                            "DteAsp"=>new XSDProperties(
                                                new XSDAttribut([
                                                    "V"=>new XSDConstraint(10,10,ORMCSchema::Base_Date,"Date d'envoi de l'avis des sommes à payer. Cette date peut correspondre à la date de départ des poursuites. Cette date doit être supérieure ou égale à la DteBordEm.\nBalise exploitée uniquement pour les bordereaux de type BORDEREAU_ORMC : Date d'envoi de l'avis des sommes à payer au niveau du rôle : s'applique à tous les articles de rôles ne possédant pas eux mêmes une date d'envoi de l'avis des sommes à payer.Cette date n'est exploitée que pour les ASAP transmis à l'usager par l'ordonnateur et non pas traités par Hélios, par conséquent sans objet pour les titres ORMC dont la balise Edition vaut 03 ASAP CPP ORMC ou 06 ASAP ORMC ENSU à éditer."),
                                                ]),
                                            ),
                                            "Objet"=>new XSDProperties(
                                                new XSDAttribut([
                                                    "V"=>new XSDConstraint(1,160,ORMCSchema::Base_Texte,"Objet global sur le bordereau ORMC : correspond à l'objet du rôle.\nBalise exploitée uniquement pour les bordereaux de type BORDEREAU_ORMC."),
                                                ]),
                                            ),
                                        ]),
                                    ),
                                    "Piece"=>new XSDProperties(
                                        new XSDChildren([
                                            "BlocPiece"=> new XSDProperties(
                                                new XSDChildren([
                                                    "IdPce"=> new XSDProperties(
                                                        new XSDAttribut([
                                                            "V"=>new XSDConstraint(1,8,ORMCSchema::Base_IdPce,"Identifiant de la pièce : Numéro du titre de recette.\nCette valeur doit être strictement supérieure à 0, à défaut, rejet du flux.\nPour un TypPce Titre ORMC (15), IdPce correspond au numéro de l'article de rôle. Le titre ORMC doit être mono-débiteur."),
                                                        ]),
                                                    ),
                                                    "TypPce"=> new XSDProperties(
                                                        new XSDAttribut([
                                                            "V"=>new XSDConstraint(2,2,ORMCSchema::Base_TypPce,"Informations destinées à déterminer le type de pièce transmis par l'ordonnateur. Le type de pièce doit être compatible avec le type de bordereau (cf annexe 2).\nLe type de pièce : « Demande d'émission de titre » n'est utilisé qu'en retour d'information (du comptable vers l'ordonnateur). Il est utilisé pour transmettre des demandes d'émission de titres lors d'un encaissement avant émission de titre.\nLe TyPce 08 et le TypPce 13 ne sont pas possibles. Ces valeurs aboutissent au rejet du bordereau.\n - 01 : Titre ordinaire\n - 02 : Titre correctif\n - 03 : Titre d'ordre budgétaire\n - 04 : Titre d'ordre mixte\n - 05 : Titre émis après paiement\n - 06 : Titre récapitulatif avec rôle\n - 07 : Titre récapitulatif sans rôle\n - 09 : Titre de majoration\n - 10 : Titre en plusieurs années\n - 11 : Titre de rattachement\n - 12 : Ordre de recette ordonnateur\n - 14 : Produits constatés d'avance\n - 15 : Titre ORMC"),
                                                        ]),
                                                    ),
                                                    "NatPce"=> new XSDProperties(
                                                        new XSDAttribut([
                                                            "V"=>new XSDConstraint(2,2,ORMCSchema::Base_NatPce,"Nature du titre.\nA utiliser en fonction du TypBord et de TypPce\nToute autre nature aboutit à un rejet du flux.\nSi elle est servie, rejet du bordereau.\nLe triplet du PESV2 fonctionne avec l'association TypBord TypPce NatPce. Le tableau des triplets doit être respecté. Toute valorisation non prévue dans le tableau doit aboutir à un rejet du bordereau concerné ou de l'ensemble des PPEM du bordereau.\n - 01 : Fonctionnement\n - 02 : Investissement\n - 03 : Inventaire\n - 04 : Emprunt\n - 05 : Régie\n - 06 : Annulation-Réduction\n - 07 : Complémentaire\n - 08 : Réémis\n - 09 : Annulant un mandat\n - 10 : Annulation du titre de rattachement\n - 11 : Marché\n - 18 : Opération d'ordre liée aux cessions"),
                                                        ]),
                                                    ),
                                                    "DteAsp"=> new XSDProperties(
                                                        new XSDAttribut([
                                                            "V"=>new XSDConstraint(10,10,ORMCSchema::Base_Date,"Date d'envoi de l'avis des sommes à payer. Cette date peut correspondre à la date de départ des poursuites. Cette date doit être supérieure ou égale à la DteBordEm. Cette date n'est exploitée que pour les ASAP transmis à l'usager par l'ordonnateur et non pas traités par Hélios, par conséquent sans objet pour les titres dont la balise Edition vaut 01 ASAP à éditer ou 02 ASAP CPP ou 03 ASAP CPP ORMC ou 05 ASAP Patient à éditer ou 06 ASAP ORMC ENSU à éditer."),
                                                        ]),
                                                    ),
                                                    "NumDette"=> new XSDProperties(
                                                        new XSDAttribut([
                                                            "V"=>new XSDConstraint(1,15,ORMCSchema::Base_Num,"Numéro de dette attribué au débiteur par l'ordonnateur, ce numéro correspond au NumeroFacture de l'article de rôle dans Hélios.\nBalise exploitée uniquement pour les titres de type ORMC."),
                                                        ]),
                                                    ),
                                                    "Per"=> new XSDProperties(
                                                        new XSDAttribut([
                                                            "V"=>new XSDConstraint(1,1,ORMCSchema::Base_Num,"Période : complément au n° de dette attribué au débiteur par l'ordonnateur. Correspond à la Période de l'article de rôle dans Hélios.\nBalise exploitée uniquement pour les titres de type ORMC."),
                                                        ]),
                                                    ),
                                                    "Cle2"=> new XSDProperties(
                                                        new XSDAttribut([
                                                            "V"=>new XSDConstraint(1,1,ORMCSchema::Base_AlphaNum,"Clé de contrôle de l'article de rôle. Clé calculée selon le modulo 23 ( sur les deux derniers chiffres de l'exercice + la période + 00 + le numéro de dette).\nBalise exploitée uniquement pour les titres de type ORMC.\nPour le mode de calcul se référer à l'ANNEXE_TECHNIQUE_PES_SEPA_ORMC"),
                                                        ]),
                                                    ),
                                                ]),
                                            ),
                                            "LigneDePiece"=> new XSDProperties(
                                                new XSDChildren([
                                                    "BlocLignePiece"=> new XSDProperties(
                                                        new XSDChildren([
                                                            "InfoLignePiece"=> new XSDProperties(
                                                                new XSDChildren([
                                                                    "IdLigne"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,6,ORMCSchema::Base_Num_IdLigne,"N° de ligne de pièce : Numéro permettant de subdiviser le titre lorsqu'il concerne plusieurs débiteurs (titres collectifs) ou plusieurs imputations (titres à imputation multiple). Dans le cas général des titres individuels n'ayant qu'une imputation budgétaire le n° de ligne est mis à 1.\nCette valeur est forcément supérieure ou égale à 1 sinon rejet du bordereau.\nPour les titres ORMC :\n- Le numéro de ligne correspond au numéro de sous-article de rôle dans Hélios.\n- Le titre ORMC doit être un titre mono débiteur."),
                                                                        ]),
                                                                    ),
                                                                    "ObjLignePce"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,160,ORMCSchema::Base_Texte,"Objet de la ligne de pièce.\nZone libre.\nPour les titres ORMC :\n- La zone ObjLignePce correspondra à l'ObjetPiece du sous-article de rôle dans Hélios."),
                                                                        ]),
                                                                    ),
                                                                    "CodProdLoc"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,4,ORMCSchema::Base_AlphaNum,"Code produit local : Information destinée à identifier la nature du produit chez l'ordonnateur.\nLe CodProdLoc est soit défini localement soit correspond aux codes produit nationaux. Il est associé dans Hélios à un Code produit national. Utilisation dans toute nomenclature.\nPour les titres ORMC :\n- Pour les lignes qui comportent un code produit géré par un budget collectivité bénéficiaire autre que le budget collectivité gestionnaire, les zones IdCollBen, CodCollBen, CodBudBen sont à compléter. Ce code produit local figure dans une Convention RMC (Rôle multi collectivités) active dans Hélios sur le budget collectivité gestionnaire."),
                                                                        ]),
                                                                    ),
                                                                    "Nature"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(3,3,ORMCSchema::Base_Nature,"Pour les titres ORMC : proposition de valorisation à 588."),
                                                                        ]),
                                                                    ),
                                                                    "Majo"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,1,ORMCSchema::Base_Booleen,"Zone permettant de savoir si la ligne de titre est majorable ou non. (Valeurs: 0=non majorable, 1=majorable. Par défaut servie à 0).\nToute autre valeur aboutit à rejet du bordereau.\nSi Majo valorisée à 1 ou TRUE, Bloc RattachPiece doit être ouvert et la valeur de NatPceOrig doit être égale à 05 sinon rejet du bordereau.\nPour les titres ORMC :\n- La zone Majo correspondra au booléen EstMajorable du sous-article de rôle dans Hélios"),
                                                                        ]),
                                                                    ),
                                                                    "TvaIntraCom"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,1,ORMCSchema::Base_Booleen,"Information permettant de déterminer si la ligne de pièce comporte de la TVA intra-communautaire.\n(Valeurs : 0=pas de Tva intra-communautaire, 1= Tva intra-communautaire.)."),
                                                                        ]),
                                                                    ),
                                                                    "MtHT"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(4,15,ORMCSchema::Base_Montant,"Montant HT ou TTC si TVA non remplie.\nPas de valeur à vide ou 0,00 sinon rejet du bordereau.\nPour les titres ORMC :\n- La zone MtHT correspond au MontantHT du sous-article de rôle dans Hélios."),
                                                                        ]),
                                                                    ),
                                                                    "MtTVA"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(4,15,ORMCSchema::Base_Montant,"Montant TVA.\nLe montant ne peut être négatif ou égal à 0. Soit la balise est absente soit elle est valorisée avec un montant supérieur à 0.\nSi cette balise est valorisée, la balise MtBordTVA doit aussi être présente et avoir un montant différent de 0.\nPour les titres ORMC :\n- La zone MtTVA correspond au MontantTVA du sous-article de rôle dans Hélios."),
                                                                        ]),
                                                                    ),
                                                                ]),
                                                            ),
                                                            "InfoPrelevementSEPA"=> new XSDProperties(
                                                                new XSDChildren([
                                                                    "NatPrel"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(2,2,ORMCSchema::Base_NatPrel,"Mode de prélèvement.\nPour tout prélèvement à émettre par le Trésor, la présence de références bancaires est obligatoire.\n - 01 : Fichier remis aux organismes bancaire par le Trésor.\n - 02 : Fichier remis aux organismes bancaires par l'ordonnateur."),
                                                                        ]),
                                                                    ),
                                                                    "PerPrel"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(2,2,ORMCSchema::Base_PerPrel,"Périodicité du prélèvement.\nA privilégier l'usage de la valeur 07 Unique, cette valeur correspondre à la notion de prélèvement unique.\n - 01 : Bimestrielle\n - 02 : Mensuelle\n - 03 : Bimensuelle\n - 04 : Trimestrielle\n - 05 : Semestrielle\n - 06 : Annuelle\n - 07 : Unique"),
                                                                        ]),
                                                                    ),
                                                                    "DtePrel"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(10,10,ORMCSchema::Base_Date,"Date de prélèvement. Date d'échéance correspondant à date de règlement interbancaire."),
                                                                        ]),
                                                                    ),
                                                                    "MtPrel"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(4,15,ORMCSchema::Base_Montant,"Date de prélèvement. Date d'échéance correspondant à date de règlement interbancaire."),
                                                                        ]),
                                                                    ),
                                                                    "SequencePres"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(2,2,ORMCSchema::Base_SequencePres,"Séquence de présentation.\n - 01 : OOFF\n - 02 : FRST\n - 03 : RCUR\n - 04 : FNAL"),
                                                                        ]),
                                                                    ),
                                                                    "DateSignMandat"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(10,10,ORMCSchema::Base_Date,"Date de signature du mandat."),
                                                                        ]),
                                                                    ),
                                                                    "RefUniMdt"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,35,ORMCSchema::Base_TexteSEPA,"Référence Unique du Mandat (RUM).\nCaractères autorisés : abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVWXYZ0123456789/-?().,:'+Espace"),
                                                                        ]),
                                                                    ),
                                                                    "LibPrel"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,140,ORMCSchema::Base_TexteSEPA,"Libellé du prélèvement : Zone libre.\nCaractères autorisés : abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVWXYZ0123456789/-?().,:'+Espace"),
                                                                        ]),
                                                                    ),
                                                                ]),
                                                            ),
                                                        ]),
                                                    ),
                                                    "Tiers"=> new XSDProperties(
                                                        new XSDChildren([
                                                            "InfoTiers"=> new XSDProperties(
                                                                new XSDChildren([
                                                                    "CatTiers"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(2,2,ORMCSchema::Base_CatTiers,"Information destinée à identifier la catégorie du tiers.\nBalise en cohérence avec NatJur. Seules les associations de la grille correspondance catégorie de tiers et nature juridique des tiers sont autorisées.\nPour un titre dont l'édition est typée '05' (ASAP Patients à éditer) et si le TypTiers est typé '01' (Débiteur principal), alors CatTiers doit obligatoirement être valorisé à '01' , sinon rejet du bordereau.\n - 1 : Personnes physiques.\n - 20 : Etat et établissements publics nationaux.\n - 21 : Régions.\n - 22 : Départements.\n - 23 : Communes.\n - 24 : Groupements de collectivités.\n - 25 : Caisses des écoles.\n - 26 : CCAS.\n - 27 : Etablissements publics de santé.\n - 28 : Ecole nationale de la santé publique.\n - 29 : Autres établissements publics et organismes internationaux.\n - 50 : Autres organismes sociaux.\n - 60 : Personnes morales de droit privé autres qu'organismes sociaux.\n - 61 : Caisses de sécurité sociale régime général.\n - 62 : Caisses de sécurité sociale régime agricole.\n - 63 : Sécurité sociale des travailleurs non salariés et professions non agricoles.\n - 64 : Autres régomes obligatoires de sécurité sociale.\n - 65 : Mutuelles et organismes d'assurance.\n - 70 : Divers autres tiers payants.\n - 71 : CNRACL.\n - 72 : IRCANTEC.\n - 73 : ASSEDIC.\n - 74 : Caisses mutualistes de retraite complémentaires."),
                                                                        ]),
                                                                    ),
                                                                    "NatJur"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(2,2,ORMCSchema::Base_NatJur,"Information destinée à identifier la nature juridique du tiers.\nLes couples CatTiers et NatJur sont décrits dans la grille Cat Nat des tiers et identiques à la dépense.\nSi les valeurs ne sont pas celles décrites dans la grille et les associations prévues dans la grille en annexe, rejet du bordereau.\n - 01 : Particuliers.\n - 02 : Artisan / Commerçant / Agriculteur.\n - 03 : Société.\n - 04 : CAM ou caisse appliquant les mêmes règles.\n - 05 : Caisse complémentaire.\n - 06 : Association.\n - 07 : Etat ou organisme d'Etat.\n - 08 : Etablissement public national.\n - 09 : Collectivité territoriale / EPL /EPS.\n - 10 : Etat étranger / ambassade.\n - 11 : CAF."),
                                                                        ]),
                                                                    ),
                                                                    "TypTiers"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(2,2,ORMCSchema::Base_TypTiers,"Type de tiers : Zone indiquant le type de tiers.\nLe code 05 « Employeur » est réservé au domaine hospitalier dans le cadre des accidents du travail.\nValorisation dans toute autre nomenclature aboutit à rejet du bordereau.\n - 01 : Débiteur principal.\n - 02 : Débiteur appliquant des règles particulières et pouvant assumer la totalité des frais de séjours.\n - 03 : Débiteur solidaire.\n - 04 : Co-débiteur.(Cette information ne doit pas être utilisée dans le cas d'une dette conjointe)\n - 05 : Employeur.\n - 06 : Malade.\n - 07 : Assuré.\n - 10 : Client.\n - 11 : Acheteur.\n - 12 : Destinataire.\n - 13 : Facture.\n - 14 : Gestionnaire TVA.\n - 15 : Comptable ( Client).\n - 20 : Emetteur.\n - 21 : Vendeur.\n - 22 : Expéditeur.\n - 23 : Fabricant.\n - 24 : Fournisseur.\n - 25 : Destinataire Paiement.\n - 26 : Comptable ( Emetteur).\n - 30 : Logement ."),
                                                                        ]),
                                                                    ),
                                                                    "Nom"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,38,ORMCSchema::Base_Texte,"Raison sociale / Nom : Norme postale.\nL'absence aboutit à rejet du bordereau ou de l'ensemble des PPEM du bordereau."),
                                                                        ]),
                                                                    ),
                                                                ]),
                                                            ),
                                                            "Adresse"=> new XSDProperties(
                                                                new XSDChildren([
                                                                    "TypAdr"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,1,ORMCSchema::Base_TypAdr,"Type d'adresse. Cette zone permet de déterminer l'adresse principale d'un tiers et les éventuelles adresses secondaires.\nLorsque le type d'adresse est positionné dans le PES sur « non précisé », il sera entré dans Hélios en « principal » si la base ne contient aucune adresse principale ou sur « secondaire » si la base contient déjà une adresse principale.\n - 0 : Non précisé.\n - 1 : Principal.\n - 2 : Secondaire."),
                                                                        ]),
                                                                    ),
                                                                    "Adr2"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,38,ORMCSchema::Base_Texte,"Adresse du tiers: Norme postale(Numéro de voie, voie)."),
                                                                        ]),
                                                                    ),
                                                                    "CP"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,5,ORMCSchema::Base_Num,"Code postal : Norme postale ou Numéro de CEDEX : Norme postale.\nLe code postal doit être numérique sur 5 caractères obligatoires, sinon rejet du bordereau.\nConsigne : Lorsque le tiers réside à l'étranger, mettre « 99999 » dans code postal (le cas échéant le code postal du pays étranger devra être positionné dans la zone ville)."),
                                                                        ]),
                                                                    ),
                                                                    "Ville"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,38,ORMCSchema::Base_Texte,"Localité de destination : Norme postale ou Libellé CEDEX : Norme postale."),
                                                                        ]),
                                                                    ),
                                                                    "CodRes"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,1,ORMCSchema::Base_Booleen,"Code résidence. Donnée permettant de déterminer si le tiers est résident en France. Valeurs : 0=résident, 1= non résident. Par défaut sur 0.\La balise CodRes à 1 ou non résident oblige à la valorisation de la balise CodPays. Si CodRes=1 et CodPays absent = rejet du bordereau.\nLa balise CodRes à 0, ou résident, oblige à la non valorisation ou à la valorisation à 100 de la balise CodPays. Sinon, rejet du bordereau."),
                                                                        ]),
                                                                    ),
                                                                ]),
                                                            ),
                                                            "CpteBancaire"=> new XSDProperties(
                                                                new XSDChildren([
                                                                    "BIC"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(8,11,ORMCSchema::Base_BIC,"Bank International Code.\nTous les caractères alphabétiques du BIC doivent être en majuscules, sinon rejet du flux.\nDoit être un code connu et valide\nsinon rejet du bordereau ou de l'ensemble des PPEM du bordereau\nLa balise est obligatoire pour toute domiciliation à l'étranger, sinon rejet du bordereau."),
                                                                        ]),
                                                                    ),
                                                                    "IBAN"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(5,34,ORMCSchema::Base_IBAN,"International Bank Account Number\nTous les caractères alphabétiques de l'IBAN doivent être en majuscules, sinon rejet du flux.\nDoit être complet et valide sinon rejet du bordereau ou de l'ensemble des PPEM du bordereau."),
                                                                        ]),
                                                                    ),
                                                                    "TitCpte"=>new XSDProperties(
                                                                        new XSDAttribut([
                                                                            "V"=>new XSDConstraint(1,32,ORMCSchema::Base_Texte,"Nom du titulaire du compte client.\nCette zone reprend la désignation du titulaire du compte à créditer telle qu'elle est précisée sur le relevé d'identité bancaire."),
                                                                        ]),
                                                                    ),
                                                                ]),
                                                            ),
                                                        ]),
                                                    ),
                                                ]),
                                            ),
                                        ]),
                                    ),
                                ]),
                            ),
                        ]),
                    ),
                ]),
            ),
        ]);
    }   
}