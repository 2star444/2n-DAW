/*
Àlex Barthelemy || 8 - 10- 2026

Programa per a dibuixar un triangle amb dígits del 0 al 9
*/

"use strict";

let output = "TRIANGLE BONIC \n\n";

const TOTAL_FILES = 10;

for (let i = 0; i < TOTAL_FILES; i++) {
    let espais = TOTAL_FILES - 1 - i;
    for (let j = 0; j < espais; j++) {
        output += " ";
    }

    for (let k = 0; k <= i; k++) {
        let digit = (i + 1 + k) % 10; //% 10 perque quan el digit és superior a 9 torni a començar des de 0
        output += digit;
    }

    for (let k = i - 1; k >= 0; k--) {
        let digit = (i + 1 + k) % 10;
        output += digit;
    }

    output += "\n";
}

const pre = document.getElementById("sortida");
if (pre) {
    pre.textContent = output;
} else {
    console.error("No s'ha trobat l'element amb id 'sortida'");
}
