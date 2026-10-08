/*
Àlex Barthelemy || 8 - 10- 2026

Programa per a dibuixar un mosaic 
*/

"use strict";

let output = "MOSAIC \n\n";

let numLn = parseInt(prompt("Dimensió del quadrat:"));

for (let i = 0; i < numLn; i++) {
    for (let j = 0; j < numLn; j++) {
        if ((i + j) % 2 === 0) {
            output += "* ";
        } else {
            output += "  ";
        }
    }
    output += "\n";
}

const pre = document.getElementById("sortida");
if (pre) {
    pre.textContent = output;
} else {
    console.error("No s'ha trobat l'element amb id 'sortida'");
}