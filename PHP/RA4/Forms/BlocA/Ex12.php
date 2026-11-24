<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 12</title>
</head>
<body>
    <form action="Ex12.php" method="post">
        <label for="comentari">COMENTARI</label>
        <textarea name ="comentari" id="comentari" rows="5" cols="40"></textarea>
        <button type="submit">ENVIAR</button>

    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $comentari = trim($_POST["comentari"] ?? "");
            if ($comentari !== "") {
                echo "<p>" . nl2br(htmlspecialchars($comentari)) . "</p>";
            } else {
                echo "<p>Has d'escriure un comentari abans d'enviar.</p>";
            }
        }
    ?>
</body>
</html>