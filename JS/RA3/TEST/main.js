/**
 * Estableix una cookie amb un nom, valor i data d'expiració especificades.
 * @param {string} nom Nom de la cookie.
 * @param {string} valor Valor de la cookie.
 * @param {number} dies Número de dies per a la data d'expiració.
 */

function setCookie(nom, valor, dies) {
    const parella = `${encodeURIComponent(nom)}=${encodeURIComponent(valor)}`;
    let cookie = `${parella}; path=/; samesite=lax`;

    if (dies === undefined || dies === null) {
        cookie = `${cookie}; max-age=31536000`; // 1 any en segons
    }

    document.cookie = cookie;
}

/**
 * 
 * @param {string} nom Nom de la cookie
 * @returns 
 */
function getCookie(nom) {
    const prefix = encodeURIComponent(nom) + "=";
    const cookies = document.cookie.split(";");

    for (const part of document.cookie.split("; ")) {
        if (part.startsWith(prefix)) {
            return decodeURIComponent(part.slice(prefix.length));
        }

        return null;
    }
}

/**
 * 
 * @param {string} nom Nom de la cookie
 */
function deleteCookie(nom) {
    document.cookie = `${encodeURIComponent(nom)}=; path=/; max-age=0`;
}