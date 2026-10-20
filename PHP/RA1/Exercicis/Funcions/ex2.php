<?php

function esMajorEdat($edat) {
    return $edat >= 18 ? true : false;
}

$edat1 = 4;
$edat2 = 83;
$edat3 = 17;

echo "Edat $edat1: " . (esMajorEdat($edat1) ? "true" : "false") . "\n";
echo "Edat $edat2: " . (esMajorEdat($edat2) ? "true" : "false") . "\n";
echo "Edat $edat3: " . (esMajorEdat($edat3) ? "true" : "false") . "\n";