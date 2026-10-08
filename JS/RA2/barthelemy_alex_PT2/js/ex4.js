/*
Àlex Barthelemy || 8 - 10 - 2026

Programa per a dibuixar la figura d'un volcà amb bucles
*/

"use strict";

let output = "VOLCÀ \n\n";

const TOTAL_FILES = 6;
const ASTERISCS_BASE = 64;
for (let i = 0; i < TOTAL_FILES; i++) {
    
    let numAsteriscs = Math.pow(2, i + 1);
    
    //Càlcul espais
    let numEspais = (ASTERISCS_BASE - numAsteriscs) / 2;

    // Afegir espais
    for (let j = 0; j < numEspais; j++) {
        output += " ";
    }

    // Afegir asteriscs
    for (let k = 0; k < numAsteriscs; k++) {
        output += "*";
    }

    output += "\n";
}

const pre = document.getElementById("sortida");
if (pre) {
    pre.textContent = output;
} else {
    console.error("No s'ha trobat l'element amb id 'sortida'");
}