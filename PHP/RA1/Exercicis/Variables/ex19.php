<?php

$totalCompra = 50;

define("LLINDAR_ENVIAMENT_GRATIS", 30);

$teEnviamentGratis = $totalCompra >= LLINDAR_ENVIAMENT_GRATIS;

$preuBaseEnviament = 4.99;

$costEnviament = $preuBaseEnviament * (1 - $teEnviamentGratis);

echo "Cost final enviament: $costEnviament €<br>";

?>