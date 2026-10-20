<?php

$nom = "Motxilla";
$preu = 29.99;
$descripcio = "Motxilla lleugera amb diversos compartiments.";

$fitxa = <<<FITXA
Fitxa del producte
Nom: $nom
Preu: $preu €
Descripció: $descripcio
FITXA;

echo $fitxa . "\n";
