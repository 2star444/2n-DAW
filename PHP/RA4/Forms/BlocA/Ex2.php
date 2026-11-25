<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <form action="Ex2.php" method="post">
        <label>NOM:
            <input type="text" name="nom">
        </label>
        <button type="submit">ENVIAR</button>
    </form>

    <?php
    if (isset($_POST["nom"]) && (!empty($_POST["nom"]))) {
        echo "<h1> Hola, " . htmlspecialchars($_POST["nom"]) . "!</h1><br>";
    }
    ?>
</body>