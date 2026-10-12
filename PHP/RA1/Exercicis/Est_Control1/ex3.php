<?php

$any = 2024;
if ($any % 4 == 0 && ($any % 100 != 0 || $any % 400 == 0)) {
    echo "L'any $any és un any de traspàs.";
} else {
    echo "L'any $any no és un any de traspàs.";
}