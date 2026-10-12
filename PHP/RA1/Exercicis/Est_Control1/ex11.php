<?php

$imc = 22.5;

if ($imc < 18.5) {
    echo "Baix pes";
} elseif ($imc >= 18.5 && $imc < 24.9) {
    echo "Pes normal";
} elseif ($imc >= 25 && $imc < 29.9) {
    echo "Sobrepès";
} else {
    echo "Obesitat";
}