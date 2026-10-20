<?php

function generaParell($a, $b)
{
    return [$a, $b];
}

$parell = generaParell("primer", "segon");

foreach ($parell as $valor) {
    echo $valor . "\n";
}