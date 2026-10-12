<?php

$metodePgament = "targeta";

switch ($metodePgament) {
    case "efectiu":
        echo "Descompte del 5% per pagament en efectiu";
        break;
    case "targeta":
        echo "Descompte del 2% per pagament amb targeta";
        break;
    case "paypal":
        echo "Descompte del 10% per pagament amb PayPal";
        break;
    default:
        echo "Mètode de pagament no vàlid";
}