# Multi Browser

Aplicació web per obrir fins a quatre adreces en finestres independents, disposades en mosaic, i consultar l'historial de visites.

## Execució

Obrir `index.html` amb una extensió de servidor local com Live Server a Visual Studio Code. És necessari servir el projecte per HTTP: si s'obren els fitxers directament amb `file://`, les cookies i el local storage poden no funcionar correctament.

## Ús i limitacions

- Introduir una adreça a cada camp i clic a **Visitar**. Si no s'indica `http://` o `https://`, s'afegeix `https://` automàticament.
- Per veure les adreces desades, fer clic a **Historial de visites**. L'historial es desa al `localStorage` del navegador.
- El navegador pot bloquejar les finestres emergents, especialment quan s'intenten obrir diverses finestres amb un sol clic. Permetre les finestres emergents per a l'adreça local si és necessari.
- La posició i la mida de les finestres depenen de la pantalla i de les restriccions del navegador, és possible que alguns navegadors ignorin les peticions de redimensionament o posicionament.

## Codi

Els fitxers JavaScript fan servir funcions declarades, variables, condicions, bucles i instruccions bàsiques del DOM. L'historial es mostra amb `createElement` i `textContent`.
