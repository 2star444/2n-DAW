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
const div = parseInt(prompt("Escriu un número"));
let divi = div % 2 === 0;
let msg = divi ? "El número és parell" : "El número és senar";
document.write(msg);

//11
const num = parseInt(prompt("Escriu un número"));
const num2 = parseInt(prompt("Escriu un altre número"));
let igual = num !== num2;
let msg2 = igual ? "Els números són iguals" : "Els números són diferents";
document.write(msg2);

//12
let num3 = parseInt(prompt("Escriu un número"));
let num4 = parseInt(prompt("Escriu un altre número"));
let num5 = parseInt(prompt("Escriu un altre número"));

let iguals = num3 === num4 && num4 === num5;
let msg3 = iguals ? "Els tres números són iguals" : "Els tres números no són iguals";
document.write(msg3);

//13
let frase = prompt("Escriu una frase");
let total = frase.ignoreCase().split("a").length - 1;
document.write("La frase conté " + total + " lletres 'a'");

//14
let frase1 = prompt("Escriu una frase");
const vocals = frase1.toLowerCase().split("").filter(char => "aeiou".includes(char)).join(", ");
document.write(`Vocals trobades: ${vocals || "No s'han trobat vocals"}`);

//15
let frase2 = prompt("Escriu una frase");
const total = frase2.toLowerCase().split("").reduce((compt, char) => "aeiou".includes(char) ? compt + 1 : compt, 0);
document.write("La frase conté " + total + " vocals");

//16
let frase3 = prompt("Escriu una frase");

function comptarVocal(frase, vocal) {
    return frase.toLowerCase().split(vocal).length - 1;
}

const vocals = ["a", "e", "i", "o", "u"];

vocals.forEach(vocal => {
    const quantitat = comptarVocal(frase3, vocal);
    console.log(`La vocal '${vocal}' apareix ${quantitat} vegades.`);
});

//17
let num6 = parseInt(prompt("Escriu un número"));
document.write(num6 % 2 === 0 ? "El número és divisible per 2" : "El número no és divisible per 2");

//18
let num7 = parseInt(prompt("Escriu un número"));
let divisors = [2, 3, 5, 7];
let valid = divisors.some(divisor => num7 % divisor === 0);
divisors.forEach(divisor => {
    if (num7 % divisor === 0) {
        document.write(`El número és divisible per ${divisor}<br>`);
    }
});
if (!valid) {
    document.write("El número no és divisible per 2, 3, 5 o 7");
}

//19
let num8 = parseInt(prompt("Escriu un número"));

let nums = [];
for (let i = 1; i <= num8; i++) {
    
    if (num8 % i === 0) {
        nums.push(i);
    }
}

document.write(`Els divisors de ${num8} són: ${nums.join(", ") || "No hi ha divisors"}`);

//20
let num9 = parseInt(prompt("Escriu un número"));
let num10 = parseInt(prompt("Escriu un altre número"));
let divisors1 = [];
for (let i = 1; i <= Math.min(num9, num10); i++) {
    if (num9 % i === 0 && num10 % i === 0) {
        divisors1.push(i);
    }
}

document.write(`Els divisors comuns de ${num9} i ${num10} són: ${divisors1.join(", ") || "No hi ha divisors comuns"}`);

//21
const num = parseInt(prompt("Escriu un número"));

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

const msg = esPrimer(num) 
    ? `El número ${num} és primer.` 
    : `El número ${num} no és primer.`;

document.write(msg);
