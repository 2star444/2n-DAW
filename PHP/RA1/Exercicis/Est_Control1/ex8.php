<?php

$num1 = 10;
$num2 = 5;
 $operador = '+';

 switch ($operador) {
    case '+':
        $resultat = $num1 + $num2;
        echo "El resultat de $num1 $operador $num2 és: $resultat";
        break;
    case '-':
        $resultat = $num1 - $num2;
        echo "El resultat de $num1 $operador $num2 és: $resultat";
        break;
    case '*':
        $resultat = $num1 * $num2;
        echo "El resultat de $num1 $operador $num2 és: $resultat";
        break;
    case '/':
        if ($num2 != 0) {
            $resultat = $num1 / $num2;
        } else {
            echo "Error: No es pot dividir per zero.";
            exit;
        }
        echo "El resultat de $num1 $operador $num2 és: $resultat";
        break;
    default:
        echo "Operador invàlid.";
        exit;  
}