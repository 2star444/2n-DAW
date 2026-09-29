<?php

$convidats = 5;
$preuPersona = 22.15;
define("LLOGUER_LOCAL", 80);

$costMenjar = $convidats * $preuPersona;
$costTotal = $costMenjar + LLOGUER_LOCAL;

echo "- CONVIDATS: " . $convidats;
echo "- PREU PERSONA: " . $preuPersona . "€";
echo "- CONST MENJAR: " . $costMenjar . "€";
echo "- COST TOTAL: " . $costTotal . "€";