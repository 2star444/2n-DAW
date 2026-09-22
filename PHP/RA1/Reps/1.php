<?php

declare(strict_types=1);

// Declaració de variables simples
$nom = 'Marc';           // string (text)
$edat = 20;               // int (nombre sencer)
$altura = 1.75;           // float (decimal)
$esEstudiant = true;      // bool (booleà: true o false)

echo "Hola, em dic $nom i tinc $edat anys.";

$preuString = "25";

// Opció A: Conversió directa (Recomanada)
$preuSencer = (int) $preuString;

// Opció B: Ús de la funció nativa
$preuSencerAlt = intval($preuString);

function calcularSuma(int $a, int $b): int
{
    return $a + $b;
}

// Ara la crida és 100% segura i no llança cap TypeError
echo calcularSuma($preuSencer, 2); // Retorna 27