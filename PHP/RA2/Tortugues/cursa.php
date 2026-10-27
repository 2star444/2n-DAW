 <?php

 $titol = "gran CURSA de LA tortuga d'or";
 $titol = netejarText($titol);
 define('META', 40);
 define('CARES_DAU', 4);


 $meta = META;

 $nom = ["greta", "BRUNA", "  nuc ", "mImOsA", "tito"];
 $tortugues = [];
 $narracio = [];
 $historial = [];

msg = "Ronda ";

for $i = 0; i = count($nom); $i++ {
    
    $tortugues[$i] = ["nom" = > netejarText($nom[$i]), "posicio" => 0, "dormides" => 0, "turbos" => 0];
}

foreach($tortugues as $tortuga) {
    echo $tortugues["nom"] . " | " . $tortugues["posicio"] . " | " . $tortugues["dormides"] . " | " . $tortugues["turbos"] . "\n";
}

//MOVIMENT

do {

} while 
for $i = 0; i = count($tortugues); $i++ {
    $resultat = tiraDau();
    mou($tortugues[$i], $resultat);
    //HISTORIAL
    $tortuga = $tortugues[$i];
    if ($tortuga["posicio"] !== 0) {
        $historial[$i] = [$tortuga["nom"] => $tortuga["posicio"]];
    }
}


function netejarText($text): string
 {
    return ucfirst(strotolower(trim($text)));
 }

function tiraDau(int $cares = CARES_DAU): int
{
    return rand(1, $cares);
}

function mou(&$tortuga, $casella)
{
$random = rand(1,10);
    if ($random === 1) {
        $tortuga["dormides"]++;
    } elseif ($random === 10) {
        $tortuga["posicio"]+= $casella + 3;
        $tortuga["turbo"]++;
    } else {
        $tortuga["posicio"] += $casella;

    }
}