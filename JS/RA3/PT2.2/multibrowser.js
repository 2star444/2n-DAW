/**
 * @file multibrowser.js
 * Lògica principal de la pàgina index.html.
 */

let openWindows = [];
let titleLetters = [];
let colorSchemeNumber = 0;

const TITLE_COLOR_SCHEMES = [
    ["#e74c3c", "#e67e22", "#f1c40f", "#2ecc71", "#1abc9c", "#3498db"],
    ["#9b59b6", "#e84393", "#00cec9", "#fdcb6e", "#e84393", "#9b59b6"]
];

/**
 * Crea el títol i canvia la combinació de colors cada cinc segons.
 * @returns {void}
 */
function initTitle() {
    const title = document.getElementById("mainTitle");
    const text = "MULTI BROWSER";
    title.textContent = "";
    titleLetters = [];

    for (let i = 0; i < text.length; i++) {
        const letter = document.createElement("span");
        letter.textContent = text[i];
        letter.style.transition = "color 0.4s ease";
        title.appendChild(letter);
        titleLetters.push(letter);
    }

    applyTitleColors();
    setInterval(applyTitleColors, 5000);
}

/**
 * Aplica la combinació de colors actual a les lletres del títol.
 * @returns {void}
 */
function applyTitleColors() {
    const colors = TITLE_COLOR_SCHEMES[colorSchemeNumber];

    for (let i = 0; i < titleLetters.length; i++) {
        titleLetters[i].style.color = colors[i % colors.length];
    }

    colorSchemeNumber++;
    if (colorSchemeNumber === TITLE_COLOR_SCHEMES.length) {
        colorSchemeNumber = 0;
    }
}

/**
 * Formata una data a dd/mm/aaaa hh:mm:ss.
 * @param {Date} date - Data que s'ha de formatar.
 * @returns {string} Data formatada.
 */
function formatDate(date) {
    const options = {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit"
    };

    return date.toLocaleString("ca-ES", options);
}

/**
 * Actualitza el rellotge que es mostra al peu de pàgina.
 * @returns {void}
 */
function updateClock() {
    document.getElementById("currentClock").textContent = formatDate(new Date());
}

/**
 * Busca una cookie pel seu nom.
 * @param {string} name - Nom de la cookie.
 * @returns {string|null} Valor de la cookie o null si no existeix.
 */
function getCookie(name) {
    const cookies = document.cookie.split("; ");

    for (let i = 0; i < cookies.length; i++) {
        const cookieParts = cookies[i].split("=");

        if (cookieParts[0] === name) {
            return decodeURIComponent(cookieParts[1]);
        }
    }

    return null;
}

/**
 * Desa una cookie durant el nombre de dies indicat.
 * @param {string} name - Nom de la cookie.
 * @param {string} value - Valor de la cookie.
 * @param {number} days - Dies de durada.
 * @returns {void}
 */
function setCookie(name, value, days) {
    const expiresDate = new Date();
    expiresDate.setDate(expiresDate.getDate() + days);

    document.cookie = name + "=" + encodeURIComponent(value)
        + "; expires=" + expiresDate.toUTCString() + "; path=/";
}

/**
 * Mostra l'última visita i desa la data i hora actuals a la cookie.
 * @returns {void}
 */
function handleLastVisitCookie() {
    const lastVisit = getCookie("last_visit");
    const lastVisitElement = document.getElementById("lastVisit");

    if (lastVisit === null) {
        lastVisitElement.textContent = "És la teva primera visita";
    } else {
        lastVisitElement.textContent = "Data i hora de l'última visita: " + lastVisit;
    }

    setCookie("last_visit", formatDate(new Date()), 30);
}

/**
 * Afegeix https:// a l'adreça si encara no té protocol.
 * @param {string} url - Adreça introduïda.
 * @returns {string} Adreça amb protocol.
 */
function normalizeUrl(url) {
    const lowerCaseUrl = url.toLowerCase();

    if (lowerCaseUrl.indexOf("http://") !== 0
        && lowerCaseUrl.indexOf("https://") !== 0) {
        return "https://" + url;
    }

    return url;
}

/**
 * Tanca les finestres que s'havien obert amb el botó Visitar.
 * @returns {void}
 */
function closePreviousWindows() {
    for (let i = 0; i < openWindows.length; i++) {
        if (openWindows[i] && !openWindows[i].closed) {
            openWindows[i].close();
        }
    }

    openWindows = [];
}

/**
 * Retorna les adreces introduïdes als camps que no estan buits.
 * @returns {string[]} Adreces introduïdes.
 */
function getValidInputs() {
    const inputIds = ["url1", "url2", "url3", "url4"];
    const urls = [];

    for (let i = 0; i < inputIds.length; i++) {
        const value = document.getElementById(inputIds[i]).value.trim();

        if (value !== "") {
            urls.push(value);
        }
    }

    return urls;
}

/**
 * Obre les adreces no buides en finestres disposades en mosaic.
 * @returns {void}
 */
function handleVisit() {
    const warningArea = document.getElementById("warningArea");
    warningArea.hidden = true;
    warningArea.textContent = "";

    closePreviousWindows();

    const urls = getValidInputs();
    if (urls.length === 0) {
        return;
    }

    const screenLeft = window.screen.availLeft || 0;
    const screenTop = window.screen.availTop || 0;
    const screenWidth = window.screen.availWidth;
    const screenHeight = window.screen.availHeight;
    const halfWidth = Math.floor(screenWidth / 2);
    const halfHeight = Math.floor(screenHeight / 2);
    let popupBlocked = false;

    for (let i = 0; i < urls.length; i++) {
        let left = screenLeft;
        let top = screenTop;
        let width = halfWidth;
        let height = halfHeight;

        if (i % 2 === 1) {
            left = screenLeft + halfWidth;
            width = screenWidth - halfWidth;
        }

        if (i >= 2) {
            top = screenTop + halfHeight;
            height = screenHeight - halfHeight;
        }

        const features = "left=" + left + ",top=" + top
            + ",width=" + width + ",height=" + height
            + ",resizable=yes,scrollbars=yes";
        const newWindow = window.open(
            normalizeUrl(urls[i]),
            "multi_win_" + i,
            features
        );

        if (newWindow === null) {
            popupBlocked = true;
        } else {
            openWindows.push(newWindow);
        }
    }

    if (popupBlocked) {
        warningArea.textContent = "Atenció: El navegador ha bloquejat una o més finestres emergents. Permet les finestres emergents a la configuració del navegador.";
        warningArea.hidden = false;
    }

    saveHistory(urls);
}

/**
 * Desa les adreces visitades a l'historial del localStorage.
 * @param {string[]} urls - Adreces que s'han de desar.
 * @returns {void}
 */
function saveHistory(urls) {
    let history = JSON.parse(localStorage.getItem("historial"));

    if (history === null) {
        history = [];
    }

    for (let i = 0; i < urls.length; i++) {
        history.push(normalizeUrl(urls[i]));
    }

    localStorage.setItem("historial", JSON.stringify(history));
}

/**
 * Obre la pàgina de l'historial en una finestra nova.
 * @returns {void}
 */
function openHistoryPage() {
    window.open("historial.html", "_blank");
}

/**
 * Inicialitza els elements i els esdeveniments de la pàgina.
 * @returns {void}
 */
function initApp() {
    initTitle();
    handleLastVisitCookie();
    updateClock();
    setInterval(updateClock, 1000);

    document.getElementById("btnVisit").addEventListener("click", handleVisit);
    document.getElementById("btnHistory").addEventListener("click", openHistoryPage);
}

document.addEventListener("DOMContentLoaded", initApp);
