<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


//constants
define('HP_MAXIM', 100);
define('XP_PER_NIVELL', 100);
define('NIVELL_MAXIM', 10);

//arrays
$inventari = [
    "Espasa" => ["quantitat" => 1, "preu" => 120.50],
    "Poció de vida" => ["quantitat" => 3, "preu" => 15.00],
    "Escut" => ["quantitat" => 1, "preu" => 80.00],
    "Fletxa" => ["quantitat" => 24, "preu" => 0.75],
];

$marcador = [
    ["nom" => "Elara", "punts" => 240, "partides" => 12],
    ["nom" => "Bram", "punts" => 180, "partides" => 9],
    ["nom" => "Thorin", "punts" => 310, "partides" => 15],
    ["nom" => "Lyra", "punts" => 95, "partides" => 4],
    ["nom" => "Gorn", "punts" => 310, "partides" => 20],
];

//1: Constants i personatge
$nomJugador = "Thorin";
$nivell = 1;
$xpActual = 270;
$hpJugador = 60;
$or = 245.5;
$viu = true;

echo "$nomJugador · $nivell · $xpActual XP · $hpJugador/100 HP · $or or <br><br>";
echo "Nom: " . gettype($nomJugador) . "<br>";
echo "Nivell: " . gettype($nivell) . "<br>";
echo "Xp Actual: " . gettype($xpActual) . "<br>";
echo "Hp Jugador: " . gettype($hpJugador) . "<br>";
echo "Or: " . gettype($or) . "<br>";
echo "Viu: " . gettype($viu) . "<br><br>";

//2: Inventari valorat
$sumaTotal = 0;
$subtotalMax = -1;
$estocMax = "";
foreach ($inventari as $clau => $valor) {
    $subtotal = number_format($valor["preu"] * $valor["quantitat"], 2);
    if ($subtotal > $subtotalMax) {
        $subtotalMax = $subtotal;
        $estocMax = $clau;
    }
    $sumaTotal += number_format($valor["preu"] * $valor["quantitat"], 2);
    echo "" . $clau . " x " . $valor["quantitat"] . " · " . $valor["preu"] . " po c/u · subtotal " . number_format($valor["preu"] * $valor["quantitat"], 2) . "<br>";
}

echo "<br>Valor total $sumaTotal po. <br>";
echo "Estoc de més valor: $estocMax, Valor: $subtotalMax  <br><br>";

//3 Experiència i Nivells
function calculaNivell(int $xp)
{
    return (1 + (int)($xp / XP_PER_NIVELL));
}

function xpFinsSeguent(int $xp)
{
    $nivell = calculaNivell($xp);

    if ($nivell >= NIVELL_MAXIM) {
        return 0;
    } else {
        return $nivell * XP_PER_NIVELL - $xp;
    }
}

$provesNivell = [30, 150, 420, 780, 1200];

foreach ($provesNivell as $n) {
    $nivellProva = calculaNivell($n);
    if ($nivellProva >= NIVELL_MAXIM) {
        $nivellProva = NIVELL_MAXIM;
        echo "XP $n --> nivell $nivellProva (nivell màxim) <br>";
    } else {
        echo "XP $n --> nivell $nivellProva (falten " . xpFinsSeguent($n) . " per al nivell " . $nivellProva + 1 . ")<br>";
    }
}

echo "<br>";
$nivell = calculaNivell($xpActual);
echo "Nivell de Thorin: " . $nivell . "<br><br>";

//4: Combat
$hpEnemic = 90;
$maEnemic = 11;
$xpEnemic = 35;

$atacJugador = 10 + $nivell * 3;

$tenenVida = $hpEnemic > 0 || $hpJugador > 0;
$ronda = 0;

while ($tenenVida) {
    $ronda++;
    if ($ronda % 3 === 0) {
        $atacJugador *= 2;
        echo "RONDA $ronda CRÍTIC!: $nomJugador fa $atacJugador de mal (enemic: " . $hpEnemic - $atacJugador . "HP)<br>";

        if ($hpEnemic > 0) {
            echo "L'enemic fa $maEnemic de mal ($nomJugador: " . $hpJugador - $maEnemic . "HP) <br>";
        }
    } else {
        echo "RONDA $ronda: $nomJugador fa $atacJugador de mal (enemic: " . $hpEnemic - $atacJugador . "HP)<br>";

        if ($hpEnemic > 0) {
            echo "L'enemic fa $maEnemic de mal ($nomJugador: " . $hpJugador - $maEnemic . "HP) <br>";
        }
    }
}

if ($hpJugador > 0) {
    echo "Victòria en $ronda rondes!<br>";
    if ($ronda <= 4) {
        $xpGuanyada = round($xpEnemic * 1.25);
        $xpActual += $xpGuanyada;
        $nivellPostCombat = calculaNivell($xpActual);
        if ($nivell !== $nivellPostCombat) {
            echo "Has pujat de nivell! $nivell --> $nivellPostCombat<br>";
        }
    } else {
        $xpActual += $xpEnemic;
        $nivellPostCombat = calculaNivell($xpActual);
        if ($nivell !== $nivellPostCombat) {
            echo "Has pujat de nivell! $nivell --> $nivellPostCombat<br>";
        }
    }
} else {
    echo "$nomJugador ha caigut en combat...<br>";
}

//5:Curacio amb pocions
function aplicaCuracio(int &$hp, int $quantitat, int $maxim = HP_MAXIM)
{
    $hp += $quantitat;
}

//8: Tancament

//No m'ha semblat molt complexe però és molt llarg i php és molt incòmode d'escriure al teclat.