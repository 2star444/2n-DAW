<?php
$paisos = [
    "es" => "Espanya",
    "fr" => "França",
    "pt" => "Portugal",
    "it" => "Itàlia"
];
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 10</title>
</head>
<body>
    <form action="Ex10.php" method="post">
        <label for="pais">Selecciona un país:</label>
        <select name="pais" id="pais">
            <option value="">-- Tria un país --</option>
            <?php foreach ($paisos as $codi => $nom): ?>
                <option value="<?= htmlspecialchars($codi) ?>">
                    <?= htmlspecialchars($nom) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $codiTriat = $_POST["pais"] ?? "";

        if ($codiTriat !== "" && isset($paisos[$codiTriat])) {
            echo "<h2>País seleccionat:</h2>";
            echo "<p>Vius a: " . htmlspecialchars($paisos[$codiTriat]) . ".</p>";
        } else {
            echo "<p>No has seleccionat cap país vàlid.</p>";
        }
    }
    ?>
</body>
</html>