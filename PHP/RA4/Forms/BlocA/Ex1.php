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
if (isset($_GET["nom"]) && (!emtpy($_GET["nom"]))) {
    echo "<h1> HOLA " . $_GET["nom"] . "!</h1><br>";
}
