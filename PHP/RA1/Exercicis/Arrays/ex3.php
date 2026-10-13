<?php

$numero = 5;
$i = 1;
$factorial = 1;

while ($i <= $numero) {
    $factorial *= $i;
    $i++;
}

echo $factorial;