<?php

$mesNumero = 3; 

echo match ($mesNumero) {
    12, 1, 2 => "És hivern.",
    3, 4, 5  => "És primavera.",
    6, 7, 8  => "És estiu.",
    9, 10, 11 => "És tardor.",
    default  => "Número de mes invàlid."
};