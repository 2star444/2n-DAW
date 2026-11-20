<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom = htmlspecialchars($_POST["nom"] ?? "");
        echo "<h1>Gràcies, " . $nom . "!</h1>";
    } else {
        echo '<form action="Ex3.php" method="post">
            <label>NOM:
                <input type="text" name="nom">
            </label>
            <button type="submit">ENVIAR</button>
        </form>';
    }
    ?>
</body>

</html>