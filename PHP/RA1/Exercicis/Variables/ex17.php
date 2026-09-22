<?php

define("PREU_BASE", 15);
define("RECARREC_FESTIU", 3);

$esFestiu = true;

$preuFinal = PREU_BASE + ($esFestiu ? RECARREC_FESTIU : 0);
echo "Preu final: $preuFinal €<br>";