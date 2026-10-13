<?php

$numeros = [24, 5, 31, 12, 47, 19];
$mesPetit = $numeros[0];

foreach ($numeros as $numero) {
	if ($numero < $mesPetit) {
		$mesPetit = $numero;
	}
}

echo "El valor més petit és: " . $mesPetit;
