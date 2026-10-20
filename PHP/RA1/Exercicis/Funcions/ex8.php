<?php

$nomEmpresa = "TechCorp";

function mostraCapçalera() {
    echo "Empresa: " . $GLOBALS["nomEmpresa"] . "\n";
}

mostraCapçalera();

// $GLOBALS permet accedir explícitament a la variable global sense barrejar àmbit local amb global.