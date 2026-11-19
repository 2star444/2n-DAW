<!DOCTYPE html>
<html lang ="en">

<head>
</head>

<body>
    <form action="Ex1.php" method ="post">
        <label>NOM:
            <input type ="text" name = nom>
        </label>
        <button type ="submit" >ENVIAR</button>
</body>

<?php
if (isset($_POST["nom"]) && (!emtpy($_POST["nom"]))) {
    echo "<h1> HOLA " . $_POST["nom"] . "!</h1><br>";
}
