<?php

//constants
define('META0', 15);
define('DAU_MAX', 3);

$nomsEntrada = ["  lULu ", "BOB  ", "  sNaIL "];

//init cargols
$cargols = [];

foreach ($nomsEntrada as $nom) {
    $cargols[] = [
        "nom" => netejarText($nom),
        "posicio" => 0,
        "dormides" => 0,
        "turbos" => 0
    ];
}

//funcions
function netejarText($text)
{
    return ucfirst(strtolower(trim($text)));
}

function tirada($cares = DAU_MAX)
{
    return rand(1, $cares);
}

function mou(&$cargol)
{
    $esdeveniment = rand(1, 10);
    if ($esdeveniment === 1) {
        $cargol['dormides']++;
    } else {
        $caselles = tirada();
        $cargol['posicio'] += $caselles;
    }
}

// bucle cursa
$meta = false;

while (!$meta) {
    for ($i = 0; $i < count($cargols); $i++) {
        mou($cargols[$i]);
    }

    foreach ($cargols as $cargol) {
        if ($cargol['posicio'] >= META0) {
            $meta = true;
            break;
        }
    }
}

//classificacio
$podium = [];
foreach ($cargols as $c) {
    $podium[$c['nom']] = $c['posicio'];
}

arsort($podium);

//guanyador
$guanyador = array_key_first($podium);
echo "El guanyador és $guanyador";
print_r($podium);
