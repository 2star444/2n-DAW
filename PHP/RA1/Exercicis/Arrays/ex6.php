<?php

$n1 = 8;
$n2 = 4;
$n3 = 12;
$n4 = 0;

$i = 1;
$nomVariable = 'n' . $i;

while ($$nomVariable != 0) {
	echo $$nomVariable . "<br>";
	$i++;
	$nomVariable = 'n' . $i;
}

