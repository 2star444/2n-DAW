<?php

$frase = "Canvia la contrasenya periòdicament.";
$fraseCensurada = str_replace("contrasenya", "*****", $frase);

echo $fraseCensurada . "\n";
