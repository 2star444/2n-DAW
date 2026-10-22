# Multi Browser

Aplicació web per obrir fins a quatre adreces en finestres independents, disposades en mosaic, i consultar-ne l'historial.

## Execució

Obre `index.html` amb una extensió de servidor local com Live Server a Visual Studio Code. És necessari servir el projecte per HTTP: si s'obren els fitxers directament amb `file://`, les cookies i l'emmagatzematge local poden no funcionar correctament.

## Ús i limitacions

- Introdueix una adreça a cada camp i prem **Visitar**. Si no s'indica `http://` o `https://`, s'hi afegeix `https://`.
- Per veure les adreces desades, prem **Historial de visites**. L'historial es desa al `localStorage` del navegador.
- El navegador pot bloquejar les finestres emergents, especialment quan s'intenten obrir diverses finestres amb un sol clic. Permet les finestres emergents per a l'adreça local si cal.
- La posició i la mida de les finestres depenen de la pantalla i de les restriccions del navegador; alguns navegadors poden ignorar les peticions de redimensionament o posicionament.

## Codi

Els fitxers JavaScript fan servir funcions declarades, variables, condicions, bucles `for` i les instruccions bàsiques del DOM. L'historial es mostra amb `createElement` i `textContent`, tal com demana l'enunciat.
