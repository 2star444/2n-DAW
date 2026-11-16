"use strict";

//Bloc A

//1.1
/**
 * Mostra per consola el missatge de benvinguda amb l'any actual.
 */
(function () {
    console.log(`[IIFE] Benvingut/da al gestor de personatges! (temporada ${new Date().getFullYear()})`);
})();

//1.2
/**
 * Elimina espais dels extrems d'un text i posa en majúscula la primera lletra de cada paraula.
 * @param {string} text El text que es vol formatar.
 * @returns {string} El text amb el format.
 */
const capitalitza = function (text) {
    return text
        .trim()
        .split(" ")
        .map((p) => p.charAt(0).toUpperCase() + p.slice(1).toLowerCase())
        .join(" ");
};

console.log(`[anònima] ${capitalitza("  lara CROFT  ")}`);

//1.3
/**
 * Simula la tirada d'un dau i retorna un número enter aleatori entre 1 i el nombre de cares.
 * @param {number} [cares=6] El nombre de cares del dau.
 * @returns {number} Un enter aleatori entre 1 i cares, tots dos inclosos.
 */
const tiradaDau = (cares = 6) => Math.floor(Math.random() * cares) + 1;

console.log(`[fletxa] Tirada d'un dau de 20: ${tiradaDau(20)}`);

//1.4
/**
 * Formata un número i afegeix la paraula "punts".
 * @param {number} n El valor numèric de la puntuació.
 * @returns {string} El número formatat amb la paraula punts.
 */
const formatPunts = (n) => `${new Intl.NumberFormat("ca-ES").format(n)} punts`;

console.log(`[fletxa] ${formatPunts(12500)}`);


//PART 2
console.log("\nPart 2. Clausures");

/**
 * Funció que multiplica la vida d'un personatge per un factor determinat.
 * @param {number} factor El factor multiplicador de la vida.
 * @returns {Function} Una funció que rep un personatge i retorna una còpia amb la vida modificada.
 */
function crearPotenciador(factor) {
    return (personatge) => ({
        ...personatge,
        vida: personatge.vida * factor,
    });
}

const boost2x = crearPotenciador(2);
const prova = { nom: "Prova", vida: 50 };

console.log(`Original: ${prova.vida} | x2: ${boost2x(prova).vida}`);
console.log(`L'original no ha canviat: ${prova.vida}`);

console.log("\nPart 3. Simulació de sobrecàrrega amb paràmetres rest");

/**
 * Calcula la puntuació d'un personatge segons el nombre d'arguments rebuts (punts, bonificació i multiplicador).
 * @param {...number} valors Llista variable d'arguments numèrics.
 * @returns {number} La puntuació total calculada.
 */
function calculaPunts(...valors) {
    if (valors.length === 1) {
        return valors[0];
    } else if (valors.length === 2) {
        return valors[0] + valors[1];
    } else if (valors.length === 3) {
        return (valors[0] + valors[1]) * valors[2];
    }
    return 0;
}

console.log(`calculaPunts(): ${calculaPunts()}`);
console.log(`calculaPunts(80): ${calculaPunts(80)}`);
console.log(`calculaPunts(80, 20): ${calculaPunts(80, 20)}`);
console.log(`calculaPunts(80, 20, 2): ${calculaPunts(80, 20, 2)}`);

//Bloc B Part 4

console.log("\nPart 4. Crear personatges amb una funció fàbrica");

/**
 * Crea un objecte personatge amb les seves dades i mètodes de gestió.
 * @param {string} nom Nom del personatge.
 * @param {number} nivell Nivell inicial del personatge.
 * @param {number} vida Punts de vida del personatge.
 * @param {string[]} [inventari=[]] Llista d'objectes inicials del personatge.
 * @returns {Object} Un objecte personatge amb les seves propietats i mètodes.
 */
function crearPersonatge(nom, nivell, vida, inventari = []) {
    return {
        nom: capitalitza(nom),
        nivell,
        vida,
        inventari: [...inventari],

        /**
         * Mostra per consola les dades del personatge i el seu inventari en una línia.
         */
        mostrar() {
            console.log(`Personatge: ${this.nom}, nivell ${this.nivell}, vida ${this.vida}`);
            console.log(`Inventari: ${this.inventari.join(", ")}`);
        },

        /**
         * Afegeix un objecte nou al final de l'inventari del personatge.
         * @param {string} nomObjecte Nom de l'objecte que es vol afegir.
         */
        afegirObjecte(nomObjecte) {
            this.inventari.push(nomObjecte);
        },

        /**
         * Comprova si el personatge pot atacar segons el seu nivell i vida.
         * @returns {boolean} Cert si tant el nivell com la vida són majors que 0.
         */
        potAtacar() {
            return this.nivell > 0 && this.vida > 0;
        },
    };
}

const inventariInicial = ["elixir"];
const lara = crearPersonatge("lara", 1, 100, inventariInicial);

lara.mostrar();
lara.afegirObjecte("daga");
lara.afegirObjecte("corda");

console.log("Després d'afegir objectes:");
lara.mostrar();
console.log(`L'inventari inicial no ha canviat: ${inventariInicial.join(", ")}`);
console.log(`La Lara pot atacar? ${lara.potAtacar() ? "Sí" : "No"}`);

//Part 5
console.log("\nPart 5. Operacions agregades");

const jugadors = [
    crearPersonatge("Mario", 5, 100, ["capa", "flor de foc"]),
    crearPersonatge("Luigi", 4, 80, ["capa", "flor de gel"]),
    crearPersonatge("Peach", 3, 60, ["capa", "corona"]),
    crearPersonatge("Bowser", 6, 120, ["capa", "poció"]),
    crearPersonatge("Yoshi", 2, 50, ["capa", "ous"]),
];

// 1. map: nivell +1 sense modificar originals
const personatgesAmbUnNivellMes = jugadors.map((j) => ({
    ...j,
    nivell: j.nivell + 1,
}));

console.log(`[map] Nivells +1: ${personatgesAmbUnNivellMes.map((j) => `${j.nom}:${j.nivell}`).join(", ")}`);
console.log(`[map] Originals sense canvis: ${jugadors.map((j) => `${j.nom}:${j.nivell}`).join(", ")}`);

// 2. filter: personatges amb més de 50 de vida
const personatgesMes50Vida = jugadors.filter((j) => j.vida > 50);
console.log(`[filter] Vida > 50: ${personatgesMes50Vida.map((j) => j.nom).join(", ")}`);

// 3. find: primer personatge amb una poció
const personatgeAmbPocio = jugadors.find((j) => j.inventari.includes("poció"));
console.log(`[find] Primer amb poció: ${personatgeAmbPocio?.nom ?? "Cap"}`);

// 4. reduce: total de punts de vida i mitjana
const totalPuntsVida = jugadors.reduce((total, j) => total + j.vida, 0);
const mitjanaVida = (totalPuntsVida / jugadors.length).toFixed(2);
console.log(`[reduce] Vida total: ${formatPunts(totalPuntsVida)} | mitjana: ${mitjanaVida}`);

// 5. Object.groupBy: agrupar en experts i principiants
const grups = Object.groupBy(jugadors, (j) => (j.nivell >= 3 ? "experts" : "principiants"));

for (const grup in grups) {
    const noms = grups[grup].map((j) => j.nom).join(", ");
    console.log(`[groupBy] ${grup} (${grups[grup].length}): ${noms}`);
}