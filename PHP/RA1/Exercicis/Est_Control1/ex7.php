<?php

$alçada = 172;

if ($alçada < 160) {
    echo "Talla S";
} elseif ($alçada >= 160 && $alçada < 174) {
    echo "Talla M";
} elseif ($alçada >= 175 && $alçada < 189) {
    echo "Talla L";
} elseif ($alçada >= 190) {
    echo "Talla XL";
}