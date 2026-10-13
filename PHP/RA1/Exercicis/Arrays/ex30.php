<?php

$quadrats = [];

for ($i = 1; $i <= 10; $i++) {
    $quadrats[$i] = $i * $i;
}

foreach ($quadrats as $quadrat) {
    echo $quadrat . "<br>";
}
