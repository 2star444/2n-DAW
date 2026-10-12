<?php 

$lletra = 'a';
$vocals = array('a', 'e', 'i', 'o', 'u');

if (in_array($lletra, $vocals)) {
    echo "La lletra '$lletra' és una vocal.";
} else {
    echo "La lletra '$lletra' no és una vocal.";
}