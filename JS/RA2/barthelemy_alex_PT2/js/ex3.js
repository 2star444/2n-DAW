"use strict";

let output = "TAULER ESCACS \n\n";

let numLn = parseInt(prompt("Quants quadrats de costat té el tauler?"));

let L;
do {
    L = parseInt(prompt("Introdueix l'amplada L de cada quadrat (entre 1 i 5):"));
} while (isNaN(L) || L < 1 || L > 5);

for (let i = 0; i < numLn * L; i++) {
    for (let j = 0; j < numLn * L; j++) {
        let filaQuadrat = Math.floor(i / L); //Math.floor dividint i entre el nombre de files, així fins que i = L  filaQuadrat = 0;
        let colQuadrat = Math.floor(j / L); // "" per columnes

        if ((filaQuadrat + colQuadrat) % 2 === 0) {
            output += "* ";
        } else {
            output += "  ";
        }
    }
    output += "\n";

    const pre = document.getElementById("sortida");
    if (pre) {
        pre.textContent = output;
    } else {
        console.error("No s'ha trobat l'element amb id 'sortida'");
    }
}