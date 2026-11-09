/**
 * Calcula estadístiques descriptives d'una llista de nombres.
 *
 * @param {...number} Nombres que es volen analitzar.
 * @returns {{quantitat: number, suma: number, mitjana: number, min: number, max: number}|null} Les estadístiques o null si no hi ha nombres.
 * @throws {TypeError} Si algun valor no és un nombre finit.
 */
function estadistiques(...nums) {
  if (nums.length === 0) {
    return null;
  }
  if (!nums.every(Number.isFinite)) {
    throw new TypeError("Han de ser nombres finits.");
  }

  const suma = nums.reduce((total, num) => total + num, 0);

  return {
    quantitat: nums.length,
    suma,
    mitjana: suma / nums.length,
    min: Math.min(...nums),
    max: Math.max(...nums),
  };
}

const notes = [7, 9, 6, 8, 10];
const resultat = estadistiques(...notes);

console.table(resultat);
if (resultat !== null) {
  console.log(`Mitjana: ${resultat.mitjana.toFixed(2)}`);
  console.log(`Màxim: ${resultat.max}`);
}
