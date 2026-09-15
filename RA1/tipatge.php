<?php

declare(strict_types=1);

namespace App\Domain\Impostos; //namespace --> nom del paquet, evitar conflictes amb altres classes

//use App\Domain\Impostos\CalculadoraImpostos; use --> importar una classe d'un altre paquet

final class CalculadoraImpostos //classe no heretada --> final
{
    public function calcular(float $preu, int $impost): float 
    {
        return $preu * ($impost / 100);
    }
}