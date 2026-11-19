<!DOCTYPE html>
<html lang ="en">

<head>
</head>

<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] === strtoupper("post")) {
    echo "<h1>Gràcies " . $_POST["nom"] . "!</h1><br>";
}else {
    echo '<form action="Ex1.php" method ="get">
        <label>NOM:
            <input type ="text" name = nom>
        </label>
        <button type ="submit" >ENVIAR</button>';
} ?>
    
</body>

