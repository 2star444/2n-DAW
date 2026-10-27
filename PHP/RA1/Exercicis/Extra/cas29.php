<?php

$dolars = 4783;

define("CANVI_DOLAR_EURO", 0.93);

$euros = $dolars * CANVI_DOLAR_EURO;

echo "EUROS: " . $euros . "€<br>";