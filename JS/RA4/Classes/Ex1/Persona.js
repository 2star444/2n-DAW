class Persona {
    #nom;
    #cognoms;
    #edat;

    constructor(nom, cognoms, edat) {
        this.#nom = nom;
        this.#cognoms = cognom;
        this.#edat = edat;
    }

    get nom() {
        return this.#nom;
    }

    set nom(nom) {
        this.#nom = nom;
    }

    get cognom() {
        return this.#cognoms;
    }

    set cognom(cognom) {
        this.#cognoms = cognoms;
    }

    get edat() {
        return this.#edat;
    }

    set edat(edat) {
        if (edat < 18 || edat > 70) {
            throw new RangeError(`L'edat ha de ser entre 18 i 70`);
        }
        this.#edat = edat;
    }

    get nomComplet() {
        return `${this.#nom} ${this.#cognoms}`;
    }

    toString() {
        return `Nom: ${this.nomComplet}, edat: ${this.edat}`;
    }
}

class Professor extends Persona {
    #moduls;

    constructor(nom, cognoms, edat, moduls = []) {
        super(nom, cognoms, edat);
        this.#moduls = [...moduls];
    }

    afegirModul(modul) {
        if (!this.#moduls.includes(modul)) {
            console.log(`No imparteix el mòdul ${modul}`);
            this.#moduls.push(modul);
            return true;

        } else {
            console.error(`Sí que imparteix el mòdul ${modul}`);
            return false;
        }
    }

    imparteix(modul) {
        if (this.#moduls.includes(modul)) {
            console.log(`Ja imparteix el mòdul ${modul}`)
        }
    }

    getModuls() {
        return [...this.#moduls];
    }

    toString() {
        const moduls = this.#moduls.map(m => (m.toString().join(', ')));
        return `${super.toString()}, Llista Mòduls: ${moduls}`;
    }
}

class ProfessorFix extends Professor {
    #codi;

    constructor(nom, cognoms, edat, moduls = [], codi) {
        super(nom, cognoms, edat, moduls = []);
        this.#codi = toUpperCase(codi);
    }

    get codi() {
        return this.#codi;
    }

    toString() {
        return `${super.toString()}, Codi: ${this.#codi}`;
    }
}

class ProfessorInteri extends Professor {
    #anyInici;

    constructor(nom, cognoms, edat, moduls = [], anyInici) {
        super(nom, cognoms, edat, moduls = []);
        this.#anyInici = anyInici;
    }

    esNou() {
        let msg = "";
        this.#anyInici = new Date().getFullYear() ? msg = `Ha començat aquest any.` : msg = `No ha començat aqeust any.`;
        console.log(msg);
    }

    toString() {
        return `${super.toString()}, Any Inici: ${this.#anyInici}`;
    }

}

//Casos d'ús
const manolo = new Professor(`Felipe`, `Neduro`, 58, ['0612']);
manolo.afegirModul(`0613`);
manolo.afegirModul(`0612`);

try {
    manolo.edat = 15;
} catch (r) {
    console.error(`ERROR: ${r}`);
}

const armando = new ProfessorFix(`Mika`, `Galera Pestante`, 45, ['m6014'], `fr444`);
armando.toString();

const nuevo = new ProfessorInteri(`Eleonor`, `Gasmo`, 60, [`a6456`, `a6333`], 2026);
nuevo.esNou();

//PART 2

class LlistaProfessorat {
    #centre;
    #professors;

    constructor(centre, professors = []) {
        this.#centre = centre;
        this.#professors = [...professors];

    }

    get professors() {
        return [...this.#professors];
    }

    afegir(p) {
        if (!p.instanceof(Professor)) {
            throw new TypeError(`No és un professor`);
        }
        this.#professors.push(p);
    }

    noms() {
        return this.#professors.map(p => (p.nomComplet)).forEach(console.log(p));
    }

    buscarPerCognom(text) {
        return this.#professors.map(p => (p.cognom.toUpperCase)).includes(text.toUpperCase());
    }

    perModul(modul) {
        return this.#professors.filter(p => (p.moduls.includes(modul)));
    }
}

//Casos d'ús

const prof = new Professor(`Isaac`, `Hojonante`, 69);
const prof1 = new Professor(`Tinky`, `Winky`, 69);
const insti = new LlistaProfessorat(`Mercè`, [nuevo, armando, manolo, prof, prof1]);

insti.noms();
insti.buscarPerCognom(`Winky`);
insti.perModul(`0612`);
//reduce
let avgEdat = insti.professors.map(p => (p.edat))

try {
    insti.professors.push(new Date().getFullYear);
} catch (r) {
    console.error(`ERROR: ${r}`);
}
