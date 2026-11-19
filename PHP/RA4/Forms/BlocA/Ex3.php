<!DOCTYPE html>
<html lang ="en">

<head>
</head>

<body>
    <form action="Ex1.php" method ="get">
        <label>NOM:
            <input type ="text" name = nom>
        </label>
        <button type ="submit" >ENVIAR</button>
</body>

<?php
while($_SERVER["REQUEST_METHOD"] === strtoupper("post")) {
    echo "<h1>Gràcies " . $_POST["nom"] . "!</h1><br>";
}