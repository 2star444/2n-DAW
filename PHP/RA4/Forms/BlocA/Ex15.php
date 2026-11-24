<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 15</title>
</head>

<body>
    <form action="Ex15.php" method="post">
        <label for="nom">NOM:</label>
        <input type="text" name="nom" id="nom">
        <button type="submit">ENVIAR</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["nom"]) && $_POST["nom"] !== "") {
            $nom = trim($_POST["nom"]);
            echo "<p>Hola, $nom!</p>";
        } else {
            echo "<p>El nom és obligatori.</p>";
        }
    }
    ?>
</body>

</html>