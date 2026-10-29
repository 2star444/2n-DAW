/**
 * Crea un compte amb el saldo i l'historial privats dins d'una clausura.
 *
 * @param {string} titular 
 * @param {number} [saldoInicial=0] - Saldo inicial
 * @returns {{titular: string, ingressar: Function, retirar: Function, saldo: Function, historial: Function}} El compte bancari.
 * @throws {TypeError} Si el saldo inicial no és un nombre finit.
 * @throws {RangeError} Si el saldo inicial és negatiu.
 */
function crearCompteBancari(titular, saldoInicial = 0) {
  if (!Number.isFinite(saldoInicial)) {
    throw new TypeError("El saldo inicial ha de ser un nombre finit.");
  }
  if (saldoInicial < 0) {
    throw new RangeError("El saldo inicial no pot ser negatiu.");
  }

  let saldoActual = saldoInicial;
  const moviments = [];

  /**
   * Comprova que l'import sigui positiu i finit.
   *
   * @param {number} quantitat - Import de l'operació.
   * @throws {TypeError} Si l'import no és un nombre finit.
   * @throws {RangeError} Si l'import no és positiu.
   */
  function validaQuantitat(quantitat) {
    if (!Number.isFinite(quantitat)) {
      throw new TypeError("La quantitat ha de ser un nombre finit.");
    }
    if (quantitat <= 0) {
      throw new RangeError("La quantitat ha de ser superior a zero.");
    }
  }

  return {
    titular,

    /**
     * Ingressa una quantitat al compte.
     *
     * @param {number} quantitat - Import que s'ingressa.
     * @returns {number} El nou saldo.
     */
    ingressar(quantitat) {
      validaQuantitat(quantitat);
      saldoActual += quantitat;
      moviments.push({ tipus: "ingrés", quantitat, saldo: saldoActual });
      return saldoActual;
    },

    /**
     * Retira una quantitat del compte.
     *
     * @param {number} quantitat - Import que es retira.
     * @returns {number} El nou saldo.
     * @throws {RangeError} Si no hi ha prou saldo disponible.
     */
    retirar(quantitat) {
      validaQuantitat(quantitat);
      if (quantitat > saldoActual) {
        throw new RangeError("No hi ha prou saldo disponible.");
      }

      saldoActual -= quantitat;
      moviments.push({ tipus: "retirada", quantitat, saldo: saldoActual });
      return saldoActual;
    },

    /**
     * Consulta el saldo actual.
     *
     * @returns {number} El saldo actual.
     */
    saldo() {
      return saldoActual;
    },

    /**
     * Retorna una còpia de l'historial de moviments.
     *
     * @returns {{tipus: string, quantitat: number, saldo: number}[]} Els moviments del compte.
     */
    historial() {
      return moviments.map((moviment) => ({ ...moviment }));
    },
  };
}

const compte = crearCompteBancari("Anna", 100);
compte.ingressar(50);
compte.retirar(30);
console.log(`Saldo de ${compte.titular}: ${compte.saldo()} €`);
console.table(compte.historial());
