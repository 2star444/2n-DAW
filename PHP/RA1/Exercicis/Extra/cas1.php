<?php

$preuMenjar = 12;
$preuBeguda = 3;

$subtotal = $preuMenjar + $preuBeguda;
define("PERCENTATGE_PROPINA", 0.10);
$propina = $subtotal * PERCENTATGE_PROPINA;
$totolAPagar = $subtotal + $propina;

echo "Subtotal: $subtotal €<br>";
echo "Propina (10%): $propina €<br>";
echo "Total a pagar: $totolAPagar €<br>";
