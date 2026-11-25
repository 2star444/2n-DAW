<?php
define("IVA", 0.21);
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 13</title>
</head>

<body>
    <form action="Ex13.php" method="post">
        <label for="quantitat">Quantitat:</label>
        <input type="number" name="quantitat" id="quantitat" min="1">

        <label for="preu">Preu (€):</label>
        <input type="number" name="preu" id="preu" step="0.01" min="0">

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $quant = $_POST["quantitat"] ?? "";
        $preu = $_POST["preu"] ?? "";

        if (is_numeric($quant) && is_numeric($preu) && $quant >= 1 && $preu >= 0) {
            $subtotal = (float)$quant * (float)$preu;
            $iva = $subtotal * IVA;
            $total = $subtotal + $iva;

            echo "<p>Subtotal: " . number_format($subtotal, 2, ",", ".") . " €</p>";
            echo "<p>IVA (21%): " . number_format($iva, 2, ",", ".") . " €</p>";
            echo "<p>Total: " . number_format($total, 2, ",", ".") . " €</p>";
        } else {
            echo "<p>Introdueix una quantitat i un preu vàlids.</p>";
        }
    }
    ?>
</body>

</html>