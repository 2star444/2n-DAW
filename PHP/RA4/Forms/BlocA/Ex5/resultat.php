<?php

if($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["producte"]) && is_numeric($_POST["quantitat"])) {
    $producte = htmlspecialchars($_POST["producte"] ?? "");
    $quantitat = (int)$_POST["quantitat"];

    echo "Has demanat $quantitat unitats de $producte.";
} else {
    echo "No has enviat cap dada.";
}