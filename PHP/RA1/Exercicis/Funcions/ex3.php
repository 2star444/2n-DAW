<?php

function duplica(&$num) {
    $num *= 2;
}

$num = 5;
echo "Valor original: $num\n";
duplica($num);

echo "El valor duplicat és: $num\n";