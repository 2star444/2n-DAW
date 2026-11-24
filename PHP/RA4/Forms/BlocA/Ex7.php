<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 7</title>
</head>
<body>
    <form action="Ex7.php" method="post">
        <label>
            <input type="radio" name="nivell" value="principiant"> Principiant
        </label>
        <label>
            <input type="radio" name="nivell" value="intermedi"> Intermedi
        </label>
        <label>
            <input type="radio" name="nivell" value="avançat"> Avançat
        </label>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["nivell"])) {
            $nivell = htmlspecialchars($_POST["nivell"]);
            echo "<p>El teu nivell és: $nivell.</p>";
        } else {
            echo "<p>No has triat cap nivell.</p>";
        }
    }
    ?>
</body>
</html>