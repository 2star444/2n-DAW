"use strict";

/**
 * Dibuixa un triangle d'asteriscs a la pàgina HTML.
 * @param {number} files Nombre de files del triangle.
 */
function dibuixarTriangle(files) {
    const sortida = document.getElementById("sortida");
    let resultat = "";

    for (let i = 1; i <= files; i++) {
        for (let j = 1; j <= i; j++) {
            resultat += "*";
        }
        resultat += "\n";
    }

    sortida.textContent = resultat;
}


/**
 * 
 * @param {number} files Files del quadrat
 */
function dibuixarQuadrat(files) {
    const sortida = document.getElementById("sortida");
    let resultat = "";

    for (let i = 1; i <= files; i++) {
        for (let j = 1; j <= i; j++) {
            if (j === 1 || j === i || i === files) {
                resultat += "*";
            } else {
                resultat += " ";
            }
        }
        resultat += "\n";
    }

    sortida.textContent = resultat;
}

dibuixarTriangle(5);
dibuixarQuadrat(5);