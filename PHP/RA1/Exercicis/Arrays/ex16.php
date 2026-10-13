<?php

$numeros = [3, 8, 11, 14, 20, 25, 32, 41];
$parells = 0;

foreach ($numeros as $numero) {
	if ($numero % 2 === 0) {
		$parells++;
	}
}

echo "Total de nombres parells: " . $parells;
