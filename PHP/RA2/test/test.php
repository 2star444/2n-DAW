<?php

// 1. Constants
define('CARES_DAU', 4);
define('META', 40);

// 2. Variables generals
$titol = netejarText("  gran CURSA de LA tortuga d'or  ");
$meta = META;

// 3. Inicialització de les tortugues
$nomsBruts = ["greta", "BRUNA", "  nuc ", "mImOsA", "tito"];
$tortugues = [];

foreach ($nomsBruts as $nom) {
    $tortugues[] = [
        "nom" => netejarText($nom),
        "posicio" => 0,
        "dormides" => 0,
        "turbos" => 0
    ];
}

// 4. Lògica de la cursa
$metaAconseguida = false;
$historial = [];
$narracio = [];
$ronda = 0;

while (!$metaAconseguida) {
    $ronda++;
    $esdevenimentsRonda = []; // Reiniciar esdeveniments ronda

    foreach ($tortugues as &$t) {
        $sort = rand(1, 10);
        
        if ($sort === 1) {
            $t["dormides"]++;
            $esdevenimentsRonda[] = $t["nom"] . " s'adorm!";
        } elseif ($sort === 10) {
            $t["turbos"]++;
            $caselles = tiraDau() + 3;
            mou($t, $caselles);
            $esdevenimentsRonda[] = $t["nom"] . " activa el turbo!";
        } else {
            $caselles = tiraDau();
            mou($t, $caselles);
        }
    }
    unset($t); 

    // --- Guardar FOTO per a l'Historial ---
    $fotoRonda = [];
    foreach ($tortugues as $t) {
        $fotoRonda[$t["nom"]] = $t["posicio"];
    }
    $historial[] = $fotoRonda;

    // --- Construir la frase del NARRADOR per a la ronda ---
    $nomLider = lider($tortugues);
    $posicioLider = $fotoRonda[$nomLider];
    
    $fraseNarrador = "Ronda $ronda: $nomLider lidera amb $posicioLider caselles.";
    if (!empty($esdevenimentsRonda)) {
        $fraseNarrador .= " " . implode(" ", $esdevenimentsRonda);
    }
    $narracio[] = $fraseNarrador;

    // Comprovar si algú ha arribat a la meta (al final de la ronda sencera)
    foreach ($tortugues as $t) {
        if ($t["posicio"] >= META) {
            $metaAconseguida = true;
        }
    }
}

// 5. Classificació i Guanyadora
$classificacio = [];
foreach ($tortugues as $t) {
    $classificacio[$t["nom"]] = $t["posicio"];
}
arsort($classificacio);

$guanyadora = array_key_first($classificacio);


// --- FUNCIONS ---

function netejarText($text) {
    return ucfirst(strtolower(trim($text)));
}

function tiraDau($cares = CARES_DAU) {
    return rand(1, $cares);
}

function mou(&$tortuga, $caselles) {
    $tortuga["posicio"] += $caselles;
}

function lider($tortugues) {
    $lider = null;
    $maxPosicio = -1;
    foreach($tortugues as $t) {
        if ($t["posicio"] > $maxPosicio) {
            $maxPosicio = $t["posicio"];
            $lider = $t["nom"];
        }
    }
    return $lider;
}
