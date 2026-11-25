<?php
$llenguatges = [
    "php" => "PHP",
    "js" => "JavaScript",
    "py" => "Python",
    "java" => "Java"
];
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 11</title>
</head>

<body>
    <form action="Ex11.php" method="post">
        <label for="llenguatge">Tria un o més llenguatges:</label>
        <select name="llenguatges[]" id="llenguatge" multiple>
            <?php foreach ($llenguatges as $codi => $nom): ?>
                <option value="<?= htmlspecialchars($codi) ?>">
                    <?= htmlspecialchars($nom) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["llenguatges"]) && is_array($_POST["llenguatges"])) {
            $seleccionats = $_POST["llenguatges"];
            $nomsValids = [];

            foreach ($seleccionats as $codi) {
                if (isset($llenguatges[$codi])) {
                    $nomsValids[] = $llenguatges[$codi];
                }
            }

            if (!empty($nomsValids)) {
                echo "<p>Llenguatges seleccionats: " . htmlspecialchars(implode(", ", $nomsValids)) . ".</p>";
            } else {
                echo "<p>No has seleccionat cap llenguatge vàlid.</p>";
            }
        } else {
            echo "<p>No hi ha cap llenguatge seleccionat.</p>";
        }
    }
    ?>
</body>

</html>