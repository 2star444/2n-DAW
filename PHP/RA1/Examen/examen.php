<?php


//P1
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
Àlex Barthelemy Fernández
Pàgina per a calcular el cost final per alumne tenint en compte el nombre d'inscrits, un possible descompte per grup i si s'ha arribat al pressupost màxim.
*/

?>

<html>

<head>
    <title>Examen PHP</title>
</head>

<body>
    <?php

    $barra = "_";


    //P2
    $nomSortida = "Excursió Montserrat";
    $preuPerAlumne = 24.95;
    $nombreAlumnes = 13;
    $pressupostMaxim = 450.87;
    $dipositJaPagat = 150.75;

    echo "<h2>EXCURSIÓ: $nomSortida </h2>";

    echo str_repeat($barra, 250);

    //P3
    define("IVA_ACTIVITATS", 0.10);
    $subtotal = $preuPerAlumne * $nombreAlumnes;
    $totalAmbIva = $subtotal + ($subtotal * IVA_ACTIVITATS);

    echo "<p> Subtotal: " . $subtotal . " €</p><br>";
    echo "<p> Total amb IVA: " . $totalAmbIva . " €</p><br>";

    //P4
    define("DESCOMPTE_GRUP", 0.05);
    $esGrupNombros = $nombreAlumnes >= 25;
    $descompte = $totalAmbIva * (DESCOMPTE_GRUP * $esGrupNombros);
    $totalAmbDescompte = $totalAmbIva - $descompte;

    //P5
    $pendentPagar = $totalAmbDescompte;
    $pendentPagar -= $dipositJaPagat;
    echo "<p> Pendent de pagar: " . $pendentPagar . " €</p><br>";

    //P6
    $superaPressupost = $totalAmbDescompte > $pressupostMaxim;

    echo $superaPressupost; //les variables booleanes es mostren com a 1 o 0, per tant, si supera el pressupost màxim, mostrarà un 1, i si no, un 0.


    //P7
    $inscritsActuals = 0;
    echo "<p> Inscrits actuals: " . $inscritsActuals . " </p><br>";
    ++$inscritsActuals;
    echo "<p> Inscrits actuals: " . $inscritsActuals . " </p><br>";
    ++$inscritsActuals;
    echo "<p> Inscrits actuals: " . $inscritsActuals . " </p><br>";
    ++$inscritsActuals;
    echo "<p> Inscrits actuals: " . $inscritsActuals . " </p><br>";

    //P8 
    #El que més m'ha costat és el càlcul amb variables booleanes per la costum de fer servir ternaris.
    ?>