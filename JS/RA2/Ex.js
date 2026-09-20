//1
alert("Hello World!");

//2
document.write("Hello World!");

//3
alert(3 + 5);

//4
const nom = prompt("Com et dius?");
document.write("Hola " + nom);

//5
const num1 = parseInt(prompt("Escriu un número"));
const num2 = parseInt(prompt("Escriu un altre número"));
const suma = num1 + num2;
document.write("La suma és: " + suma);

//6
let numero = parseInt(prompt("Escriu un número"));
document.write(++numero);

//7
let numero2 = parseInt(prompt("Escriu un número"));
document.write(numero2++);

//8
const n = parseInt(prompt("Escriu un número"));
const m = parseInt(prompt("Escriu un altre número"));

document.write(Math.max(n, m));

//9
const n1 = parseInt(prompt("Escriu un número"));
const n2 = parseInt(prompt("Escriu un altre número"));
const n3 = parseInt(prompt("Escriu un altre número"));

document.write(Math.max(n1, n2, n3));

//10
const div10 = parseInt(prompt("Escriu un número"));
let divi10 = div10 % 2 === 0;
let msg10 = divi10 ? "El número és parell" : "El número és senar";
document.write(msg10);

//11
const num11 = parseInt(prompt("Escriu un número"));
const num12 = parseInt(prompt("Escriu un altre número"));
let igual11 = num11 !== num12;
let msg11 = igual11 ? "Els números són iguals" : "Els números són diferents";
document.write(msg11);

//12
let num13 = parseInt(prompt("Escriu un número"));
let num14 = parseInt(prompt("Escriu un altre número"));
let num15 = parseInt(prompt("Escriu un altre número"));

let iguals12 = num13 === num14 && num14 === num15;
let msg12 = iguals12 ? "Els tres números són iguals" : "Els tres números no són iguals";
document.write(msg12);

//13
let frase13 = prompt("Escriu una frase");
let total13 = frase13.toLowerCase().split("a").length - 1;
document.write("La frase conté " + total13 + " lletres 'a'");

//14
let frase14 = prompt("Escriu una frase");
const vocals14 = frase14.toLowerCase().split("").filter(char => "aeiou".includes(char)).join(", ");
document.write(`Vocals trobades: ${vocals14 || "No s'han trobat vocals"}`);

//15
let frase15 = prompt("Escriu una frase");
const total15 = frase15.toLowerCase().split("").reduce((compt, char) => "aeiou".includes(char) ? compt + 1 : compt, 0);
document.write("La frase conté " + total15 + " vocals");

//16
let frase16 = prompt("Escriu una frase");

function comptarVocal(frase, vocal) {
    return frase.toLowerCase().split(vocal).length - 1;
}

const vocals16 = ["a", "e", "i", "o", "u"];

vocals16.forEach(vocal => {
    const quantitat16 = comptarVocal(frase16, vocal);
    console.log(`La vocal '${vocal}' apareix ${quantitat16} vegades.`);
});

//17
let num17 = parseInt(prompt("Escriu un número"));
document.write(num17 % 2 === 0 ? "El número és divisible per 2" : "El número no és divisible per 2");

//18
let num18 = parseInt(prompt("Escriu un número"));
let divisors18 = [2, 3, 5, 7];
let valid18 = divisors18.some(divisor => num18 % divisor === 0);
divisors18.forEach(divisor => {
    if (num18 % divisor === 0) {
        document.write(`El número és divisible per ${divisor}<br>`);
    }
});
if (!valid18) {
    document.write("El número no és divisible per 2, 3, 5 o 7");
}

//19
let num19 = parseInt(prompt("Escriu un número"));

let nums19 = [];
for (let i = 1; i <= num19; i++) {
    if (num19 % i === 0) {
        nums19.push(i);
    }
}

document.write(`Els divisors de ${num19} són: ${nums19.join(", ") || "No hi ha divisors"}`);

//20
let num20a = parseInt(prompt("Escriu un número"));
let num20b = parseInt(prompt("Escriu un altre número"));
let divisors20 = [];
for (let i = 1; i <= Math.min(num20a, num20b); i++) {
    if (num20a % i === 0 && num20b % i === 0) {
        divisors20.push(i);
    }
}

document.write(`Els divisors comuns de ${num20a} i ${num20b} són: ${divisors20.join(", ") || "No hi ha divisors comuns"}`);

//21
const num21 = parseInt(prompt("Escriu un número"));

function esPrimer(n) {
    if (n <= 1) return false;
    if (n === 2) return true;
    if (n % 2 === 0) return false;

    const limit = Math.sqrt(n);
    for (let i = 3; i <= limit; i += 2) {
        if (n % i === 0) return false;
    }
    return true;
}

const msg21 = esPrimer(num21)
    ? `El número ${num21} és primer.`
    : `El número ${num21} no és primer.`;

document.write(msg21);
