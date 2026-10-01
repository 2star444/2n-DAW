//EX1
let rep = 6;

for (let i = 0; i < rep; i++) {
  document.write(`<H${i + 1}>Capçalera H${i + 1}</H${i + 1}> <br>`);
}

//EX2
let num = parseInt(prompt("Introdueix un número: "));
for (let i = 1; i <= 12; i++) {
  document.write(`${i} x ${num} = ${num * i} <br>`);
}

//EX3
/*
taula en codi html amb el nombre de files i
columes preguntades a l'usuari mitjançant la funció window.prompt. Mostra dins de cada
cel·la de la taula un nombre aleatori entre el 0 i el 99 (Math.floor(Math.random()*100)).
*/

let files = parseInt(prompt("Introdueix el nombre de files: "));
let colums = parseInt(prompt("Introdueix el nombre de columnes: "));

document.write("<table border='1'>");
for (let i = 0; i < files; i++) {
  document.write("<tr>");
  for (let j = 0; j < colums; j++) {
    let randomNum = Math.floor(Math.random() * 100);
    document.write(`<td>${randomNum}</td>`);
  }
  document.write("</tr>");
}
document.write("</table>");

//EX4
/*
programa que demani una quantitat de diners (múltiple de 5 en euros) i el
desglossi en bitllets de 500, 200, 100, 50, 20, 10 i 5 euros intentant donar el mínim
nombre de bitllets.
*/

let diners = parseInt(prompt("Introdueix una quantitat de diners (múltiple de 5): "));
let bitllets = [500, 200, 100, 50, 20, 10, 5];
document.write(`Desglossament de ${diners} euros: <br>`);
for (let i = 0; i < bitllets.length; i++) {
  let numBitllets = Math.floor(diners / bitllets[i]);
  if (numBitllets > 0) {
    document.write(`${numBitllets} bitllets de ${bitllets[i]} euros <br>`);
    diners -= numBitllets * bitllets[i];
  }
}

//EX5 
/*
Donats 137 minuts calcula hores i minuts. 
*/
let minuts = 137;
let hores = Math.floor(minuts / 60);
let minutsRestants = minuts % 60;
document.write(`${hores}h ${minutsRestants}m`);

//EX6
let nom = prompt("Introdueix el teu nom: ");

if (nom === undefined || nom === null) {
  document.write("Hola convidat.");
} else if (nom.trim() === "") {
  document.write(`Hola, `);
} else {
  document.write(`Hola, ${nom}.`);
}

//EX7
/*
Validació que accepti només enters positius.
*/

let num3; 

do {
  num3 = parseInt(prompt("Introdueix un número enter positiu: "));
  if (isNaN(num3) || num3 < 0 || !Number.isInteger(num3)) {
    alert("Si us plau, introdueix un número enter positiu.");
  }
} while (isNaN(num3) || num3 < 0);

