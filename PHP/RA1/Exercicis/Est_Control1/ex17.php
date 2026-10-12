<?php

$temperatura = 25;

if ($temperatura < 0 && $temperatura <= 37.2) {
    echo "La temperatura és normal.";

} elseif ($temperatura > 37.2 && $temperatura <= 38.9) {
    echo "La temperatura és febrícula.";

} else {
    echo "Febre.";
}