/**
 * Genera un informe amb informació sobre un text.
 *
 * @param {string} text - Text que es vol analitzar.
 * @returns {{caracters: number, paraules: number, majuscules: string, conteJavaScript: boolean, textAmbInicialsMajuscules: string}} L'informe del text.
 * @throws {TypeError} Si el valor rebut no és una cadena.
 */
function informeText(text) {
  if (typeof text !== "string") {
    throw new TypeError("El text ha de ser una cadena.");
  }

  const textRetallat = text.trim();
  const paraules = textRetallat === "" ? [] : textRetallat.split(/\s+/u);
  const textAmbInicialsMajuscules = paraules
    .map((paraula) => {
      const caracters = [...paraula];
      return caracters[0].toLocaleUpperCase("ca") + caracters.slice(1).join("");
    })
    .join(" ");

  return {
    caracters: textRetallat.length,
    paraules: paraules.length,
    majuscules: text.toLocaleUpperCase("ca"),
    conteJavaScript: /(^|[^\p{L}\p{N}_])javascript(?=$|[^\p{L}\p{N}_])/iu.test(text),
    textAmbInicialsMajuscules,
  };
}

console.table(informeText("  Aprendre JavaScript és divertit  "));
