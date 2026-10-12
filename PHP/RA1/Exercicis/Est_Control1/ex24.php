<?php

$edat = 18;
$preuEntrada = ($edat < 12)
    ? 5
    : (($edat >= 12 && $edat < 65) ? 10 : 7);

echo "El preu de l'entrada és: $preuEntrada €";

/*
El resultat  és menys que la versió original.
Ternari si opcions < 3.
*/