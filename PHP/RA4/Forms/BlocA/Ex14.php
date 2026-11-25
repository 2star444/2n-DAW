<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 14</title>
</head>

<body>
    <form action="Ex14.php" method="post">
        <label for="usuari">Usuari:</label>
        <input type="text" name="usuari" id="usuari">

        <label for="clau">Clau:</label>
        <input type="password" name="clau" id="clau">

        <input type="hidden" name="origen" value="exercici14">

        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $user = trim($_POST["usuari"] ?? "");
        $pwd = $_POST["clau"] ?? "";
        $origen = $_POST["origen"] ?? "";

        if ($user !== "" && $pwd !== "") {
            $longitud = mb_strlen($pwd);

            echo "<p>Usuari: " . htmlspecialchars($user) . "</p>";
            echo "<p>La contrasenya té " . $longitud . " caràcters.</p>";
            echo "<p>Origen del formulari: " . htmlspecialchars($origen) . "</p>";
        } else {
            echo "<p>Has d'omplir l'usuari i la contrasenya.</p>";
        }
    }
    ?>
</body>

</html>