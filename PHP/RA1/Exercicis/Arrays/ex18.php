<?php

$numeros = [17, 42, 8, 63, 29, 51];
$mesGran = $numeros[0];

foreach ($numeros as $numero) {
	if ($numero > $mesGran) {
		$mesGran = $numero;
	}
}

echo "El valor més gran és: " . $mesGran;

