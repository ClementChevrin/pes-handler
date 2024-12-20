<?php

namespace App\PES\Type\Trait;

trait EnumTrait {
    /**
     * Convertit l'enum en string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * Crée une instance de l'enum à partir d'une chaîne
     * 
     * @param string $value
     * @return self
     * @throws \ValueError Si la valeur n'est pas valide
     */
    public static function fromString(string $value): self
    {
        $cases = array_map(fn($case) => $case->value, self::cases());
        
        if (!in_array($value, $cases)) {
            throw new \ValueError(sprintf(
                'La valeur "%s" est invalide. Les valeurs autorisées sont : [%s]',
                $value,
                implode(', ', $cases)
            ));
        }

        return self::from($value);
    }
}