console.info("Iniciant la comprovació...");
const alumnes = [
{ nom: "Anna", nota: 8 },
{ nom: "Joan", nota: 4 },
{ nom: "Marta", nota: 9 },
];
console.table(alumnes);
console.group("Resultats");
for (const { nom, nota } of alumnes) {
if (nota < 5) console.warn(`${nom} ha suspès (${nota})`);
else console.log(`${nom} ha aprovat (${nota})`);
}
console.groupEnd();
console.time("mitjana");
let suma = 0;
for (const a of alumnes) suma += a.nota;
const mitjana = suma / alumnes.length;
console.timeEnd("mitjana"); // mitjana: 0.05ms
console.assert(mitjana >= 0 && mitjana <= 10, "La mitjana ha d'estar entre 0 i 10");
console.assert(alumnes.length === 4, "Esperàvem 4 alumnes"); // es mostra l'error