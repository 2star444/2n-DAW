<?php

$resposta = 'si';

switch ($resposta) {
    case 'si':
        echo "Perfecte, continuem!";
        break;
    case 'no':
        echo "D'acord, ho deixem aquí";
        break;
    default:
        echo "Resposta no vàlida.";
        exit;  
}