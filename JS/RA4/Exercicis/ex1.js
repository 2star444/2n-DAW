/**
 * Aplica una operació a dos nombres.
 *
 * @param {number} a - Primer operand.
 * @param {number} b - Segon operand.
 * @param {Function} Callback que calcula el resultat.
 * @returns {number} El resultat de l'operació.
 * @example calcula(8, 2, operacions.divisio); // 4
 */
function calcula(a, b, operacio) {
  if (typeof operacio !== "function") {
    throw new TypeError("L'operació ha de ser una funció.");
  }

  return operacio(a, b);
}

const operacions = {
  /**
   * Suma dos nombres.
   *
   * @param {number} 
   * @param {number} 
   * @returns {number} La suma.
   */
  suma: (a, b) => a + b,

  /**
   * Resta dos nombres.
   *
   * @param {number} 
   * @param {number} 
   * @returns {number} La diferència.
   */
  resta: (a, b) => a - b,

  /**
   * Multiplica dos nombres.
   *
   * @param {number} a - Primer operand.
   * @param {number} 
   * @returns {number} El producte.
   */
  multiplicacio: (a, b) => a * b,

  /**
   * Divideix dos nombres.
   *
   * @param {number} 
   * @param {number} 
   * @returns {number} 
   * @throws {Error} Si el divisor és zero.
   */
  divisio: (a, b) => {
    if (b === 0) {
      throw new Error("No es pot dividir per zero.");
    }

    return a / b;
  },

  /**
   * Eleva un nombre a una potència.
   *
   * @param {number}
   * @param {number} 
   * @returns {number} La potència.
   */
  potencia: (a, b) => a ** b,
};

const a = 8;
const b = 2;
const resultats = Object.entries(operacions).map(([nom, operacio]) => ({
  operacio: nom,
  resultat: calcula(a, b, operacio),
}));

console.table(resultats);
