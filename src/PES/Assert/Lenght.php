<?php

namespace App\PES\Assert;

use Exception;
use App\PES\Assert\AssertInterface;

/**
 * Validateur de longueur de chaîne
 * Permet de vérifier qu'une chaîne respecte des contraintes de longueur
 */
class Lenght implements AssertInterface
{
    private ?int $exactValue = null;
    private ?string $exactMessage = null;
    private ?int $minValue = null;
    private ?string $minMessage = null;
    private ?int $maxValue = null;
    private ?string $maxMessage = null;

    /**
     * @param string $value Valeur à valider
     */
    public function __construct(private string $value) {
    }
    
    #region [Setter]
    /**
     * Définit une longueur exacte attendue
     * 
     * @param int $exactValue Longueur exacte requise
     * @param string|null $message Message d'erreur personnalisé
     * @return self
     */
    public function setExact(int $exactValue, ?string $message = null): self 
    {
        $this->exactValue = $exactValue;
        $this->exactMessage = $message ?? "La valeur doit faire exactement {$exactValue} caractères";
        return $this;
    }

    /**
     * Définit une longueur minimale
     * 
     * @param int $minValue Longueur minimale requise
     * @param string|null $message Message d'erreur personnalisé
     * @return self
     */
    public function setMin(int $minValue, ?string $message = null): self 
    {
        $this->minValue = $minValue;
        $this->minMessage = $message ?? "La valeur doit faire au moins {$minValue} caractères";
        return $this;
    }

    /**
     * Définit une longueur maximale
     * 
     * @param int $maxValue Longueur maximale autorisée
     * @param string|null $message Message d'erreur personnalisé  
     * @return self
     */
    public function setMax(int $maxValue, ?string $message = null): self 
    {
        $this->maxValue = $maxValue;
        $this->maxMessage = $message ?? "La valeur ne doit pas dépasser {$maxValue} caractères";
        return $this;
    }
    #endregion
    
    /**
     * Vérifie que la valeur respecte les contraintes de longueur définies
     * 
     * @throws Exception Si la validation échoue
     */
    public function verify(): void
    {
        $length = mb_strlen($this->value);

        if ($this->exactValue !== null) {
            if ($length !== $this->exactValue) {
                throw new Exception($this->exactMessage);
            }
        }
        else{
            if ($this->minValue !== null && $length < $this->minValue) {
                throw new Exception($this->minMessage); 
            }

            if ($this->maxValue !== null && $length > $this->maxValue) {
                throw new Exception($this->maxMessage);
            }
        }
    }
}