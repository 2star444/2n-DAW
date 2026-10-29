const usuaris = {
  noms: [
    "joan garcia",
    "jaume pontons",
    "ana riu",
    "marta aran",
    "alex fornell",
    "mariona cots",
  ],
};

/**
 * Cerca noms segons el nombre de paràmetres rebut.
 *
 * @param {...string} criteris - Cap criteri, un prefix o un nom i cognom.
 * @returns {string[]} Tots els noms, els noms amb el prefix o la coincidència exacta.
 * @throws {TypeError} Si algun criteri no és una cadena.
 * @throws {RangeError} Si es passen més de dos criteris.
 */
function trobar(...criteris) {
  if (criteris.length > 2) {
    throw new RangeError("La cerca accepta com a màxim dos paràmetres.");
  }
  if (!criteris.every((criteri) => typeof criteri === "string")) {
    throw new TypeError("Els criteris de cerca han de ser cadenes.");
  }

  if (criteris.length === 0) {
    return [...usuaris.noms];
  }
  if (criteris.length === 1) {
    return usuaris.noms.filter((nom) => nom.startsWith(criteris[0]));
  }

  const nomComplet = `${criteris[0]} ${criteris[1]}`;
  return usuaris.noms.filter((nom) => nom === nomComplet);
}

console.log("Tots:", trobar());
console.log('Comencen per "ja":', trobar("ja"));
console.log('Coincidència exacta:', trobar("joan", "garcia"));
