<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 9</title>
</head>
<body>
    <form action="Ex9.php" method="post">
        <label>
            <input type="checkbox" name="aficions[]" value="música"> Música
        </label>
        <label>
            <input type="checkbox" name="aficions[]" value="esport"> Esport
        </label>
        <label>
            <input type="checkbox" name="aficions[]" value="lectura"> Lectura
        </label>
        <label>
            <input type="checkbox" name="aficions[]" value="cinema"> Cinema
        </label>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["aficions"]) && is_array($_POST["aficions"])) {
            $aficions = $_POST["aficions"];
            echo "<p>Aficions: " . htmlspecialchars(implode(", ", $aficions)) . " - Total: " . count($aficions) . "</p>";

        } else {
            echo "<p>No has triat cap afició.</p>";
        }

    }
    ?>
</body>
</html>