<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <form action="ex1.php" method="get">
        <label>NOM:
            <input type="text" name="nom">
        </label>
        <button type="submit">ENVIAR</button>
    </form>

    <?php
    if (isset($_GET["nom"]) && !empty($_GET["nom"])) {
        echo "<h1>Hola, " . htmlspecialchars($_GET["nom"]) . "!</h1><br>";
    }
    ?>
</body>

</html>