<?php
define('META', 40);
define('CARES_DAU', 4);

$meta = META;

// neteja títol
$titolBrut = "  gran CURSA de LA tortuga d'or  ";
$titol = netejarText($titolBrut);

// noms
$noms = ["greta", "BRUNA", "  nuc ", "mImOsA", "tito"];

// inicialització tortugues i variables seguiment
$tortugues = [];
for ($i = 0; $i < count($noms); $i++) {
    $tortugues[] = [
        "nom"      => netejarText($noms[$i]),
        "posicio"  => 0,
        "dormides" => 0,
        "turbos"   => 0
    ];
}

$historial = [];
$narracio = [];
$ronda = 0;

// bucle cursa

do {
    $ronda++;
    $eventsRonda = [];

    // cada tortuga juga el seu torn
    for ($i = 0; $i < count($tortugues); $i++) {
        $sort = rand(1, 10);
        $dau = tiraDau();

        if ($sort === 1) {
            // s'adorm: no es mou i suma 1 a dormides
            $tortugues[$i]['dormides']++;
            $eventsRonda[] = $tortugues[$i]['nom'] . " s'adorm!";
        } elseif ($sort === 10) {
            // turbo: avança dau + 3 caselles i suma 1 a turbos
            mou($tortugues[$i], $dau + 3);
            $tortugues[$i]['turbos']++;
            $eventsRonda[] = $tortugues[$i]['nom'] . " activa el turbo!";
        } else {
            // moviment normal
            mou($tortugues[$i], $dau);
        }
    }

    // foto de la ronda a $historial 
    $fotoRonda = [];
    foreach ($tortugues as $t) {
        $fotoRonda[$t['nom']] = $t['posicio'];
    }
    $historial[] = $fotoRonda;

    // determinar líder ronda
    $nomLider = lider($tortugues);
    $posLider = 0;
    foreach ($tortugues as $t) {
        if ($t['nom'] === $nomLider) {
            $posLider = $t['posicio'];
            break;
        }
    }

    // generar frase a $narracio
    $frase = "Ronda $ronda: $nomLider lidera amb $posLider caselles.";
    if (!empty($eventsRonda)) {
        $frase .= " " . implode(" ", $eventsRonda);
    }
    $narracio[] = $frase;

    // comprovar si hi ha guanyador
    $algunaAMeta = false;
    foreach ($tortugues as $t) {
        if ($t['posicio'] >= META) {
            $algunaAMeta = true;
            break;
        }
    }

} while (!$algunaAMeta);

// classificacio 
$classificacio = [];
foreach ($tortugues as $t) {
    $classificacio[$t['nom']] = $t['posicio'];
}

// ordena descendent per posició
arsort($classificacio);

// primera clau és la guanyadora
$guanyadora = array_key_first($classificacio);


require "visual.php";



// neteja text eliminant espais, en minúscules i primera lletra en majúscula
function netejarText(string $text): string
{
    return ucfirst(strtolower(trim($text)));
}


// retorna  número aleatori entre 1 i el nombre de cares 
function tiraDau(int $cares = CARES_DAU): int
{
    return rand(1, $cares);
}

// mou la tortuga canviant posició per referència
function mou(array &$tortuga, int $caselles): void
{
    $tortuga['posicio'] += $caselles;
}

// retorna el nom de la tortuga líder si hi ha empat, la primera de l'array
function lider(array $tortugues): string
{
    $liderNom = $tortugues[0]['nom'];
    $maxPos = $tortugues[0]['posicio'];

    for ($i = 1; $i < count($tortugues); $i++) {
        if ($tortugues[$i]['posicio'] > $maxPos) {
            $maxPos = $tortugues[$i]['posicio'];
            $liderNom = $tortugues[$i]['nom'];
        }
    }

    return $liderNom;
}