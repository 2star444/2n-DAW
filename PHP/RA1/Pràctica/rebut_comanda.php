<?php
//P1 - Preparació del fitxer
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
 Àlex Barthelemy Fernández
 Pàgina web on es mostra el rebut d'una comanda amb càlculs de preus, descomptes i estoc sense fer servir estructures de control.
 */
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Rebut de la comanda</title>
</head>

<body>

    <?php
    //P2 - Declaració de variables i càlculs
    $article = "Plàtan";
    $preuUnitat = 1.5;
    $unitats = 3;
    $client = "Joan";
    $estocDisponible = 5;

    echo "<h2>Comanda de $client</h2>";

    //P3 - Càlculs de preus i declaració constant IVA
    echo "Article: " . $article . " — Preu unitat: " . $preuUnitat . " € — Unitats: " . $unitats . "<br>";

    define("IVA", 0.21);

    $subtotal = $preuUnitat * $unitats;
    $totalAmbIva = $subtotal + ($subtotal * IVA);
    echo "Subtotal: " . $subtotal . " €<br>";
    echo "Total amb IVA: " . $totalAmbIva . " €<br>";

    //P4 - Càlcul de l'estoc restant i declaració variable booleana
    $hiHaEstoc = $unitats <= $estocDisponible;

    // A php el valor d'una variable booleana té els valors de true (1) o false (0), per tant, podem mostrar directament el valor de la variable booleana $hiHaEstoc.
    echo "Hi ha estoc suficent?: " . $hiHaEstoc . "<br>";

    echo "Estoc abans de la compra: " . $estocDisponible . " unitats<br>";
    $estocDisponible -= $unitats;
    echo "Estoc després de la compra: " . $estocDisponible . " unitats<br>";

    //P5 - Càlcul del descompte per socis
    $esSoci = true;
    define("DESCOMPTE_SOCI", 0.10);

    $compleixCondicions = $esSoci && ($totalAmbIva > 50);

    $importDescompte = $totalAmbIva * DESCOMPTE_SOCI * $compleixCondicions;
    $totalFinal = $totalAmbIva - $importDescompte;

    echo "Import del descompte: " . $importDescompte . " €<br>";
    echo "Total final a pagar: " . $totalFinal . " €<br>";

    //P6 - Tancament
    // La part que m'ha costat més ha estat realitzar càlculs directes amb expressions booleanes ($compleixCondicions) en comptes de fer servir ternaris.
    ?>

</body>

</html>