<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Exercici 6</title>
</head>

<body>
    <?php
    $nom = htmlspecialchars($_GET["nom"] ?? "desconegut");
    $preu = $_GET["preu"] ?? 0;

    if (!is_numeric($preu)) {
        $preu = 0;
    }

    echo "<p>Producte: $nom</p>";
    echo "<p>Preu: $preu €</p>";
    ?>
</body>

</html>