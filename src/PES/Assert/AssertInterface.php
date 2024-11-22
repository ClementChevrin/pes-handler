<?php

namespace App\PES\Assert;

use Exception;

interface AssertInterface 
{
    /**
     * Vérifie la validité de la valeur
     * 
     * @throws Exception Si la validation échoue
     */
    public function verify(): void;
}
