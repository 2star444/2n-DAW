<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 4</title>
</head>

<body>
    <form action="Ex4.php" method="post">
        <label>NOM:</label>
        <input type="text" name="nom">
        <label>EDAT:</label>
        <input type="number" name="edat">
        <button type="submit">ENVIAR</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["nom"]) &&  is_numeric($_POST["edat"])) {
        $nom = htmlspecialchars($_POST["nom"]  ?? "");
        $edat = (int)$_POST["edat"];
        $msg = "$nom,";
        $edat >= 18 ? $msg .= " ets major d'edat." : $msg .= " ets menor d'edat.";
        echo "<h1>$msg</h1>";
    }

    ?>

</body>

</html>