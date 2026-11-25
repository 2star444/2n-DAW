<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 8</title>
</head>

<body>
    <form action="Ex8.php" method="post">
        <label>
            <input type="checkbox" name="acceptar" value="acceptar"> Accepto les condicions
        </label>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["acceptar"])) {
            echo "<p>Has acceptat les condicions.</p>";
        } else {
            echo "<p>Has de marcar la casella per continuar.</p>";
        }
    }
    ?>
</body>

</html>