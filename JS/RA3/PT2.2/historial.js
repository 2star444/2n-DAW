/**
 * @file historial.js
 */

/**
 * Mostra adreces desades al localStorage.
 * @returns {void}
 */
function renderHistory() {
    const historyList = document.getElementById("historyList");
    const history = JSON.parse(localStorage.getItem("historial"));
    historyList.textContent = "";

    if (history === null) {
        return;
    }

    for (let i = 0; i < history.length; i++) {
        const item = document.createElement("li");
        item.textContent = history[i];
        historyList.appendChild(item);
    }
}

/**
 * Actualitza llista quan canvia l'historial en una altra finestra.
 * @param {StorageEvent}
 * @returns {void}
 */
function handleStorageChange(event) {
    if (event.key === "historial") {
        renderHistory();
    }
}

/**
 * Carrega historial i escolta els canvis d'altres finestres.
 * @returns {void}
 */
function initHistory() {
    renderHistory();
    window.addEventListener("storage", handleStorageChange);
}

document.addEventListener("DOMContentLoaded", initHistory);
