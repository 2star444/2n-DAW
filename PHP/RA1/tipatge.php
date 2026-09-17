<?php

declare(strict_types=1);

namespace App\Domain\Factura;

use App\Domain\Impostos\CalculadoraImpostos;
use InvalidArgumentException;

final class Factura
{
    public function __construct(
        private readonly CalculadoraImpostos $calculadora
    ) {}

    public function calcularTotal(float $subtotal, float $descompte = 0.0): float
    {
        if ($descompte < 0.0 || $descompte > 1.0) {
            throw new InvalidArgumentException('El descompte ha de ser un percentatge entre 0.0 i 1.0.');
        }

        $subtotalAmbDescompte = $subtotal * (1.0 - $descompte);

        return $this->calculadora->calcular($subtotalAmbDescompte, 21);
    }
}
}