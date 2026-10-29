// S2 · Calculadora amb callbacks · Versió amb errors per depurar

const operacions = {
  suma: (a, b) => a + b,
  resta: (a, b) => a + b,
  multiplicacio: (a, b) => a * b,
  divisio: (a, b) => {
    if (b === 0) throw new Error("No es pot dividir per zero");
    return a / b;
  },
  potencia: (a, b) => a ^ b,
};

function calcula(a, b, operacio) {
  return operacio(a, b);
}

const proves = [
  { a: 8, b: 2, nom: "suma", esperat: 10 },
  { a: 8, b: 2, nom: "resta", esperat: 6 },
  { a: 8, b: 2, nom: "multiplicacio", esperat: 16 },
  { a: 8, b: 2, nom: "divisio", esperat: 4 },
  { a: 2, b: 3, nom: "potencia", esperat: 8 },
  { a: 7, b: "3", nom: "suma", esperat: 10 },
  { a: 5, b: 0, nom: "divisio", esperat: "Error" },
];

const resultats = [];
for (const prova of proves) {
  const obtingut = calcula(prova.a, prova.b, operacions[prova.nom]);
  resultats.push({
    operacio: `${prova.a} ${prova.nom} ${prova.b}`,
    esperat: prova.esperat,
    obtingut: obtingut,
    correcte: obtingut === prova.esperat,
  });
}

console.table(resultats);