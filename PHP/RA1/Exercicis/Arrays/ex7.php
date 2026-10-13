<?php

$n1 = 14;
$n2 = 7;
$n3 = 25;
$n4 = 3;
$n5 = 18;

$numeros = [$n1, $n2, $n3, $n4, $n5];
$mesGran = $n1;

foreach ($numeros as $numero) {
	if ($numero > $mesGran) {
		$mesGran = $numero;
	}
}

echo "El número més gran és: " . $mesGran;


