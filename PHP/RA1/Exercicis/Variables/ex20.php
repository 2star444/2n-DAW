<?php

$preuEntrada = 10;
$nombreEntrades = 4;
$esDiaEspectador = true; 


define("DESCOMPTE_ESPECTADOR", 0.20);


$subtotal = $preuEntrada * $nombreEntrades;

$descompte = $subtotal * DESCOMPTE_ESPECTADOR * $esDiaEspectador;

$totalFinal = $subtotal - $descompte;

echo "Subtotal: $subtotal €<br>";
echo "Descompte aplicat: $descompte €<br>";
echo "Total final a pagar: $totalFinal €<br>";

?>