<?php

$suma = 0;

for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 === 0 || $i % 5 === 0) {
        $suma += $i;
    }
}

echo $suma;