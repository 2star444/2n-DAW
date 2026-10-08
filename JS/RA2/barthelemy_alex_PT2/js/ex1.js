/*
Àlex Barthelemy || 8 - 10- 2026

Escriu un programa que dibuixi per pantalla les figures “B”, “C” i “D”, demanant a l'usuari
el nombre de línies del dibuix, valida que el valor introduït sigui un enter entre 1 i 20:
*/


"use strict";

let numLn;

// Validació entrada
do {
    numLn = parseInt(prompt("Número de línies (1 - 20)"));
} while (isNaN(numLn) || numLn > 20 || numLn < 1);

let outputText = "";

// Figura B
outputText += "Figura B:\n\n";
for (let i = 0; i < numLn; i++) {
    for (let j = 0; j < numLn; j++) {
        if (i === 0 || i === numLn - 1 || j === 0 || j === numLn - 1) {
            outputText += "* ";
        } else {
            outputText += "  ";
        }
    }
    outputText += "\n";
}

outputText += "\n";

// Figura C
outputText += "Figura C:\n\n";
for (let i = 0; i < numLn; i++) {
    for (let j = 0; j < numLn; j++) {
        if (i === j || i >= j) {
            outputText += "* ";
        } else {
            outputText += "  ";
        }
    }
    outputText += "\n";
}

outputText += "\n";

// Figura D
outputText += "Figura D:\n\n";
for (let i = 0; i < numLn; i++) {
    for (let j = 0; j < numLn; j++) {
        if (i === j|| i <= j) {
            outputText += "* ";
        } else {
            outputText += "  ";
        }
    }
    outputText += "\n";
}

const pre = document.getElementById("sortida");
if (pre) {
    pre.textContent = outputText;
} else {
    console.error("No s'ha trobat l'element amb id 'sortida'");
}