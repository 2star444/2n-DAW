<?php

$vendesMes = 15000; 

define("SOU_FIX", 1200);
define("PERCENTATGE_COMISSIO", 0.08);

$comissio = $vendesMes * PERCENTATGE_COMISSIO;
$souTotal = SOU_FIX + $comissio;

echo "SOU FIX: " . SOU_FIX . "€<br>";
echo "COMISSIÓ: " . $comissio . "€<br>";
echo "SOU TOTAL: " . $souTotal . "€<br>";