/**
 * Operacions de comptatge de la civilització Yahoo.
 *
 * @namespace yahoo
 */
const yahoo = (() => {
  const nombres = ["zero", "un", "dos", "tres", "quatre", "molts"];
  const desconegut = "desconegut";

  /**
   * Retorna el següent nombre conegut pels Yahoo.
   *
   * @param {string} numero - Nombre Yahoo.
   * @returns {string} El següent nombre o "desconegut".
   */
  function seguent(numero) {
    const index = nombres.indexOf(numero);
    if (index === -1) {
      return desconegut;
    }

    return nombres[Math.min(index + 1, nombres.length - 1)];
  }

  /**
   * Suma dos nombres Yahoo segons les regles de la civilització.
   *
   * @param {...string} valors - Cap valor, un nombre o dos nombres Yahoo.
   * @returns {string} El resultat de la suma.
   * @throws {RangeError} Si es passen més de dos valors.
   */
  function suma(...valors) {
    if (valors.length > 2) {
      throw new RangeError("La suma accepta com a màxim dos nombres.");
    }
    if (valors.length === 0) {
      return desconegut;
    }
    if (valors.length === 1) {
      return valors[0];
    }

    const [numero, valor] = valors;
    if (numero === desconegut || !nombres.includes(numero)) {
      return desconegut;
    }
    if (numero === "zero") {
      return valor;
    }
    if (numero === "molts") {
      return "molts";
    }

    const repeticions = nombres.indexOf(numero);
    let resultat = valor;
    for (let i = 0; i < repeticions; i++) {
      resultat = seguent(resultat);
    }
    return resultat;
  }

  return { seguent, suma };
})();

console.log(yahoo.seguent("quatre")); // "molts"
console.log(yahoo.suma("un", "dos")); // "tres"
console.log(yahoo.suma("dos", "tres")); // "molts"
console.log(yahoo.suma("molts", "un")); // "molts"
