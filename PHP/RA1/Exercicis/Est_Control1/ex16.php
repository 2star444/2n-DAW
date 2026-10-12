<?php

$costatA = 5;
$costatB = 10;
$costatC = 15;

if ($costatA == $costatB && $costatB == $costatC) {
    echo "El triangle és equilàter.";
} elseif ($costatA == $costatB || $costatA == $costatC || $costatB == $costatC) {
    echo "El triangle és isòsceles.";
} else {
    echo "El triangle és escalè.";
}