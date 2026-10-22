/**
 * @file historial.js
 * Lògica per mostrar i actualitzar l'historial de visites.
 */

/**
 * Mostra les adreces desades al localStorage.
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
 * Actualitza la llista quan canvia l'historial en una altra finestra.
 * @param {StorageEvent} event - Esdeveniment de canvi del localStorage.
 * @returns {void}
 */
function handleStorageChange(event) {
    if (event.key === "historial") {
        renderHistory();
    }
}

/**
 * Carrega l'historial i escolta els canvis d'altres finestres.
 * @returns {void}
 */
function initHistory() {
    renderHistory();
    window.addEventListener("storage", handleStorageChange);
}

document.addEventListener("DOMContentLoaded", initHistory);
