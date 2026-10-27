visual.php

<?php
/*
 * visual.php — PART VISUAL DE LA PRÀCTICA "LA CURSA DE TORTUGUES"
 *
 * Aquest fitxer NO s'ha de modificar. Dibuixa la cursa a partir de les
 * variables que prepara el teu programa i et diu si alguna cosa no quadra.
 *
 * Al final del teu fitxer PHP només has d'afegir:   require "visual.php";
 */

function cursa_validar(array $d): array
{
    $checks = [];
    $fatal = false;
    $add = function (string $nivell, string $text, bool $greu = false) use (&$checks, &$fatal) {
        $checks[] = ['nivell' => $nivell, 'text' => $text];
        if ($nivell === 'error' && $greu) {
            $fatal = true;
        }
    };
    $netejar = function (string $t): string {
        return ucfirst(strtolower(trim($t)));
    };

    // ---------- $titol ----------
    $titol = $d['titol'];
    if ($titol === null) {
        $add('error', 'Falta la variable $titol (el nom de la cursa).');
    } elseif (!is_string($titol) || trim($titol) === '') {
        $add('error', '$titol ha de ser un text (string) que no estigui buit.');
    } else {
        $add('ok', '$titol existeix: "' . $titol . '".');
        if ($titol !== $netejar($titol)) {
            $add('avis', '$titol no està net. Recorda treure els espais sobrants i deixar només la primera lletra en majúscula (trim, strtolower, ucfirst).');
        }
    }

    // ---------- $meta ----------
    $meta = $d['meta'];
    $metaOk = false;
    if ($meta === null) {
        $add('error', 'Falta la variable $meta (les caselles que té la pista).', true);
    } elseif (!is_int($meta) || $meta <= 0) {
        $add('error', '$meta ha de ser un número enter (int) més gran que 0.', true);
    } else {
        $metaOk = true;
        $add('ok', '$meta val ' . $meta . ' caselles.');
    }

    // ---------- $tortugues ----------
    $tort = $d['tortugues'];
    $noms = [];
    $finals = [];
    $tortuguesOk = false;
    if ($tort === null) {
        $add('error', 'Falta la variable $tortugues (l\'array amb les tortugues).', true);
    } elseif (!is_array($tort) || count($tort) < 2) {
        $add('error', '$tortugues ha de ser un array amb com a mínim dues tortugues.', true);
    } else {
        $problema = null;
        $tipus = ['nom' => 'is_string', 'posicio' => 'is_int', 'dormides' => 'is_int', 'turbos' => 'is_int'];
        foreach ($tort as $i => $t) {
            if ($problema !== null) {
                continue;
            }
            if (!is_array($t)) {
                $problema = 'L\'element ' . $i . ' de $tortugues no és un array amb les dades d\'una tortuga.';
                continue;
            }
            foreach ($tipus as $clau => $funcio) {
                if ($problema === null && (!array_key_exists($clau, $t) || !$funcio($t[$clau]))) {
                    $problema = 'A l\'element ' . $i . ' de $tortugues, la clau "' . $clau . '" falta o no té el tipus correcte ('
                        . ($clau === 'nom' ? 'text' : 'número enter') . ').';
                }
            }
        }
        if ($problema !== null) {
            $add('error', $problema, true);
        } else {
            $noms = array_column($tort, 'nom');
            if (count(array_unique($noms)) !== count($noms)) {
                $add('error', 'Hi ha dues tortugues amb el mateix nom a $tortugues.', true);
            } else {
                $tortuguesOk = true;
                foreach ($tort as $t) {
                    $finals[$t['nom']] = $t['posicio'];
                }
                $add('ok', '$tortugues té ' . count($tort) . ' tortugues amb les claus nom, posicio, dormides i turbos.');
                $brutes = [];
                foreach ($noms as $n) {
                    if ($n !== $netejar($n)) {
                        $brutes[] = '"' . $n . '"';
                    }
                }
                if (count($brutes) > 0) {
                    $add('avis', 'Aquests noms no estan nets: ' . implode(', ', $brutes) . '. Treu els espais i deixa només la primera lletra en majúscula.');
                }
            }
        }
    }

    // ---------- $historial ----------
    $hist = $d['historial'];
    $histOk = false;
    if ($hist === null) {
        $add('error', 'Falta la variable $historial (la "foto" de cada ronda).', true);
    } elseif (!is_array($hist) || count($hist) === 0) {
        $add('error', '$historial ha de ser un array amb una entrada per ronda (ara està buit).', true);
    } elseif (!$tortuguesOk) {
        $add('avis', '$historial no es pot comprovar fins que $tortugues sigui correcte.');
    } else {
        $problema = null;
        $nomsOrd = array_map('strval', $noms);
        sort($nomsOrd, SORT_STRING);
        foreach ($hist as $r => $ronda) {
            if ($problema !== null) {
                continue;
            }
            if (!is_array($ronda)) {
                $problema = 'La ronda ' . ($r + 1) . ' de $historial no és un array (nom => posició).';
                continue;
            }
            $claus = array_map('strval', array_keys($ronda));
            sort($claus, SORT_STRING);
            if ($claus !== $nomsOrd) {
                $problema = 'La ronda ' . ($r + 1) . ' de $historial ha de tenir una entrada per cada tortuga, amb el nom com a clau i la posició com a valor.';
                continue;
            }
            foreach ($ronda as $pos) {
                if (!is_int($pos)) {
                    $problema = 'A la ronda ' . ($r + 1) . ' de $historial, les posicions han de ser números enters.';
                }
            }
        }
        if ($problema !== null) {
            $add('error', $problema, true);
        } else {
            $histOk = true;
            $add('ok', '$historial té ' . count($hist) . ' rondes i cada una té la posició de totes les tortugues.');
            $hist = array_values($hist);
            // regles de la cursa
            $anterior = array_fill_keys($noms, 0);
            $retrocedeix = null;
            foreach ($hist as $r => $ronda) {
                foreach ($ronda as $nom => $pos) {
                    if ($retrocedeix === null && $pos < $anterior[$nom]) {
                        $retrocedeix = $nom . ' (ronda ' . ($r + 1) . ')';
                    }
                }
                $anterior = $ronda;
            }
            if ($retrocedeix !== null) {
                $add('error', 'Una tortuga ha retrocedit: ' . $retrocedeix . '. Les posicions mai poden disminuir.');
            }
            if ($metaOk) {
                $ultima = $hist[count($hist) - 1];
                if (max($ultima) < $meta) {
                    $add('error', 'A l\'última ronda cap tortuga ha arribat a la meta (' . $meta . '). La cursa no ha acabat.');
                } else {
                    $add('ok', 'A l\'última ronda alguna tortuga arriba a la meta.');
                }
                $abans = null;
                foreach ($hist as $r => $ronda) {
                    if ($r < count($hist) - 1 && max($ronda) >= $meta && $abans === null) {
                        $abans = $r + 1;
                    }
                }
                if ($abans !== null) {
                    $add('error', 'La cursa havia d\'acabar a la ronda ' . $abans . ': allà ja hi havia una tortuga a la meta, però has seguit jugant.');
                }
            }
            $ultima = $hist[count($hist) - 1];
            $difereix = [];
            foreach ($finals as $nom => $pos) {
                if ($ultima[$nom] !== $pos) {
                    $difereix[] = $nom;
                }
            }
            if (count($difereix) > 0) {
                $add('error', 'La posició final a $tortugues no coincideix amb l\'última ronda de $historial per a: ' . implode(', ', $difereix) . '.');
            } else {
                $add('ok', 'Les posicions de $tortugues coincideixen amb l\'última ronda de $historial.');
            }
        }
    }

    // ---------- $narracio ----------
    $narr = $d['narracio'];
    $narrOk = false;
    if ($narr === null) {
        $add('error', 'Falta la variable $narracio (una frase del narrador per cada ronda).');
    } elseif (!is_array($narr)) {
        $add('error', '$narracio ha de ser un array de textos.');
    } else {
        $noText = 0;
        foreach ($narr as $f) {
            if (!is_string($f)) {
                $noText++;
            }
        }
        if ($noText > 0) {
            $add('error', '$narracio només pot contenir textos (strings).');
        } elseif ($histOk && count($narr) !== count($hist)) {
            $add('error', '$narracio té ' . count($narr) . ' frases però $historial té ' . count($hist) . ' rondes: ha d\'haver-hi una frase per ronda.');
        } else {
            $narrOk = true;
            $add('ok', '$narracio té una frase per cada ronda.');
        }
    }

    // ---------- $classificacio ----------
    $clas = $d['classificacio'];
    $clasOk = false;
    if ($clas === null) {
        $add('error', 'Falta la variable $classificacio (nom => posició, de la primera a l\'última).');
    } elseif (!is_array($clas)) {
        $add('error', '$classificacio ha de ser un array amb el nom com a clau i la posició com a valor.');
    } elseif (!$tortuguesOk) {
        $add('avis', '$classificacio no es pot comprovar fins que $tortugues sigui correcte.');
    } else {
        $clauCl = array_map('strval', array_keys($clas));
        $nomsOrd2 = array_map('strval', $noms);
        sort($clauCl, SORT_STRING);
        sort($nomsOrd2, SORT_STRING);
        if ($clauCl !== $nomsOrd2) {
            $add('error', '$classificacio ha de tenir una entrada per cada tortuga, amb el nom com a clau.');
        } else {
            $valorsMals = [];
            foreach ($clas as $nom => $pos) {
                if (!isset($finals[$nom]) || $finals[$nom] !== $pos) {
                    $valorsMals[] = $nom;
                }
            }
            $valors = array_values($clas);
            $ordenada = true;
            for ($i = 1; $i < count($valors); $i++) {
                if ($valors[$i] > $valors[$i - 1]) {
                    $ordenada = false;
                }
            }
            if (count($valorsMals) > 0) {
                $add('error', 'A $classificacio la posició no coincideix amb la final de: ' . implode(', ', $valorsMals) . '.');
            } elseif (!$ordenada) {
                $add('error', '$classificacio no està ordenada: ha d\'anar de la posició més gran a la més petita.');
            } else {
                $clasOk = true;
                $add('ok', '$classificacio està ordenada de més a menys caselles.');
            }
        }
    }

    // ---------- $guanyadora ----------
    $guan = $d['guanyadora'];
    if ($guan === null) {
        $add('error', 'Falta la variable $guanyadora (el nom de la tortuga que guanya).');
    } elseif (!is_string($guan)) {
        $add('error', '$guanyadora ha de ser un text amb el nom de la tortuga guanyadora.');
    } elseif ($clasOk) {
        if ($guan === array_key_first($clas)) {
            $add('ok', '$guanyadora és "' . $guan . '", la primera de la classificació.');
        } else {
            $add('error', '$guanyadora val "' . $guan . '", però la primera de $classificacio és "' . array_key_first($clas) . '".');
        }
    } else {
        $add('avis', '$guanyadora no es pot comprovar fins que $classificacio sigui correcta.');
    }

    return [
        'checks' => $checks,
        'fatal' => $fatal || !$metaOk || !$tortuguesOk || !$histOk,
        'clasOk' => $clasOk,
    ];
}

$__resultat = cursa_validar([
    'titol' => $titol ?? null,
    'meta' => $meta ?? null,
    'tortugues' => $tortugues ?? null,
    'historial' => $historial ?? null,
    'narracio' => $narracio ?? null,
    'classificacio' => $classificacio ?? null,
    'guanyadora' => $guanyadora ?? null,
]);
$__checks = $__resultat['checks'];
$__dibuixar = !$__resultat['fatal'];
$__errors = 0;
$__avisos = 0;
$__oks = 0;
foreach ($__checks as $__c) {
    if ($__c['nivell'] === 'error') {
        $__errors++;
    } elseif ($__c['nivell'] === 'avis') {
        $__avisos++;
    } else {
        $__oks++;
    }
}
$__h = function (string $t): string {
    return htmlspecialchars($t, ENT_QUOTES, 'UTF-8');
};

// ---------- Dades per al JavaScript ----------
$__json = 'null';
$__noms = [];
if ($__dibuixar) {
    $__noms = array_map('strval', array_column($tortugues, 'nom'));
    $__historial = [];
    foreach (array_values($historial) as $__ronda) {
        $__fila = [];
        foreach ($__noms as $__n) {
            $__fila[] = $__ronda[$__n];
        }
        $__historial[] = $__fila;
    }
    $__frases = [];
    foreach ($__historial as $__r => $__x) {
        $__frases[] = (is_array($narracio ?? null) && isset(array_values($narracio)[$__r]) && is_string(array_values($narracio)[$__r]))
            ? array_values($narracio)[$__r] : 'Ronda ' . ($__r + 1);
    }
    $__finalsMap = [];
    $__stats = [];
    foreach ($tortugues as $__t) {
        $__finalsMap[$__t['nom']] = $__t['posicio'];
        $__stats[] = ['nom' => (string)$__t['nom'], 'posicio' => $__t['posicio'], 'dormides' => $__t['dormides'], 'turbos' => $__t['turbos']];
    }
    // Classificació: la de l'alumne si és vàlida, o una de calculada per aquest fitxer
    $__clasValida = $__resultat['clasOk'];
    if ($__clasValida) {
        $__clas = $classificacio;
    } else {
        $__clas = $__finalsMap;
        arsort($__clas);
    }
    $__clasJs = [];
    foreach ($__clas as $__n => $__p) {
        $__clasJs[] = ['nom' => (string)$__n, 'posicio' => $__p];
    }
    $__json = json_encode([
        'titol' => is_string($titol ?? null) ? $titol : 'La cursa de tortugues',
        'meta' => $meta,
        'noms' => $__noms,
        'historial' => $__historial,
        'narracio' => $__frases,
        'classificacio' => $__clasJs,
        'estadistiques' => $__stats,
        'classificacioPropia' => $__clasValida,
    ], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}
$__colors = ['#2e7d32', '#1565c0', '#ef6c00', '#8e24aa', '#c62828', '#00838f', '#6d4c41', '#455a64'];
$__titolPagina = is_string($titol ?? null) && trim($titol) !== '' ? $titol : 'La cursa de tortugues';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $__h($__titolPagina) ?></title>
<style>
  :root { --meta: <?= $__dibuixar ? (int)$meta : 40 ?>; --fons1: #e6f4ea; --fons2: #d3eaf0; --tinta: #16323a; --aigua: #0b4f5c; }
  * { box-sizing: border-box; }
  body { margin: 0; min-height: 100vh; color: var(--tinta); background: linear-gradient(var(--fons1), var(--fons2));
         font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif; }
  .app { max-width: 980px; margin: 0 auto; padding: 22px 16px 48px; }
  h1 { margin: 0; font-size: 1.9rem; color: var(--aigua); letter-spacing: -.01em; }
  .sub { margin: .25rem 0 1rem; color: #4a6b73; }
  .targeta { background: #fff; border-radius: 16px; padding: 14px; box-shadow: 0 4px 18px rgba(11,79,92,.12); }
  .carril { display: grid; grid-template-columns: 104px 1fr; align-items: center; gap: 10px; margin: 8px 0; }
  .etiqueta { font-weight: 700; font-size: .9rem; padding: 5px 10px; border-radius: 999px; background: var(--c); color: #fff;
              text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .carril.guanyadora .etiqueta { box-shadow: 0 0 0 3px #fff, 0 0 0 6px #f9a825; }
  .terra { position: relative; height: 60px; border-radius: 10px;
           background:
             repeating-linear-gradient(to right, rgba(0,0,0,.08) 0 1px, transparent 1px calc(100% / var(--meta))),
             linear-gradient(#cfe8d5, #bddcc7); }
  .terra::after { content: ""; position: absolute; right: 0; top: 0; bottom: 0; width: 14px; border-radius: 0 10px 10px 0;
                  background: repeating-conic-gradient(#1b1b1b 0 25%, #fff 0 50%) 0 0 / 14px 14px; }
  .tortuga { position: absolute; top: 6px; left: 0; width: 56px; height: 48px; transition: left .9s cubic-bezier(.3,.8,.3,1); }
  .tortuga svg { width: 100%; height: 100%; display: block; overflow: visible; }
  .zzz { position: absolute; top: -12px; left: 34px; font-size: 16px; opacity: 0; transition: opacity .25s; }
  .tortuga.dorm .zzz { opacity: 1; }
  .control { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; margin: 14px 0 10px; }
  .control button { font: inherit; font-weight: 600; border: 0; border-radius: 10px; padding: 8px 14px; cursor: pointer;
                    background: var(--aigua); color: #fff; }
  .control button.sec { background: #fff; color: var(--aigua); box-shadow: inset 0 0 0 2px var(--aigua); }
  .control button:hover { filter: brightness(1.12); }
  .ronda { margin-left: auto; font-weight: 700; color: var(--aigua); }
  .barra { height: 8px; border-radius: 99px; background: #cfe3e7; overflow: hidden; margin-bottom: 12px; }
  .barra > div { height: 100%; width: 0; background: linear-gradient(90deg, #2e7d32, #00838f); transition: width .5s; }
  .narrador { display: flex; gap: 12px; align-items: flex-start; background: #fffbe6; border: 2px solid #f3e08a; border-radius: 14px; padding: 12px 14px; }
  .narrador .mic { font-size: 1.6rem; line-height: 1; }
  .narrador p { margin: 0; font-size: 1.05rem; min-height: 1.4em; }
  #resultat { margin-top: 18px; }
  #resultat[hidden] { display: none; }
  .guanyadora-text { text-align: center; font-size: 1.5rem; font-weight: 800; color: var(--aigua); margin: 4px 0 14px; }
  .podi { display: flex; justify-content: center; align-items: flex-end; gap: 10px; margin-bottom: 16px; }
  .podi .lloc { width: 150px; text-align: center; }
  .podi .nom { font-weight: 700; margin-bottom: 4px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
  .podi .bloc { border-radius: 10px 10px 0 0; color: #fff; font-weight: 800; font-size: 2rem; padding-top: 8px; }
  .lloc.p1 .bloc { height: 120px; background: #f9a825; } .lloc.p2 .bloc { height: 90px; background: #90a4ae; } .lloc.p3 .bloc { height: 68px; background: #a1887f; }
  .podi .pos { font-size: .85rem; color: #4a6b73; }
  table { width: 100%; border-collapse: collapse; font-size: .95rem; }
  th, td { text-align: center; padding: 7px 8px; border-bottom: 1px solid #e3edf0; }
  th { color: var(--aigua); font-size: .85rem; text-transform: uppercase; letter-spacing: .04em; }
  td:first-child, th:first-child { text-align: left; }
  .comprovacions { margin-top: 22px; }
  .comprovacions summary { cursor: pointer; font-weight: 700; padding: 10px 14px; border-radius: 12px; background: #fff; box-shadow: 0 2px 10px rgba(11,79,92,.1); }
  .comprovacions.hi-ha-errors summary { background: #fdecea; color: #a63d40; }
  .comprovacions ul { list-style: none; margin: 8px 0 0; padding: 12px 16px; background: #fff; border-radius: 12px; }
  .comprovacions li { padding: 5px 0 5px 28px; position: relative; font-size: .93rem; }
  .comprovacions li::before { position: absolute; left: 0; font-weight: 800; }
  .comprovacions li.ok::before { content: "\2714"; color: #2e7d32; }
  .comprovacions li.avis::before { content: "\26A0"; color: #ef6c00; }
  .comprovacions li.error::before { content: "\2716"; color: #c62828; }
  .comprovacions li.error { color: #a63d40; font-weight: 600; }
  .bloqueig { background: #fdecea; border: 2px solid #e8b4b4; border-radius: 14px; padding: 16px 18px; margin-bottom: 14px; color: #5c2a2a; }
  .bloqueig strong { color: #a63d40; }
  @media (prefers-reduced-motion: reduce) { .tortuga, .barra > div { transition: none; } }
</style>
</head>
<body>
<main class="app">
<?php if ($__dibuixar): ?>
  <header>
    <h1>🏁 <?= $__h($__titolPagina) ?></h1>
    <p class="sub"><?= count($__noms) ?> tortugues · pista de <?= (int)$meta ?> caselles</p>
  </header>

  <section class="targeta" aria-label="Pista de la cursa">
<?php foreach ($__noms as $__i => $__nom): $__color = $__colors[$__i % count($__colors)]; ?>
    <div class="carril" id="c<?= $__i ?>" style="--c: <?= $__color ?>">
      <div class="etiqueta" title="<?= $__h($__nom) ?>"><?= $__h($__nom) ?></div>
      <div class="terra">
        <div class="tortuga" id="t<?= $__i ?>">
          <span class="zzz" aria-hidden="true">💤</span>
          <svg viewBox="0 0 64 40" aria-hidden="true">
            <ellipse cx="17" cy="33" rx="6.5" ry="4.2" fill="#6b8e5a"/>
            <ellipse cx="40" cy="33" rx="6.5" ry="4.2" fill="#6b8e5a"/>
            <path d="M3 27 L12 22 L12 29 Z" fill="#6b8e5a"/>
            <circle cx="55" cy="22" r="7.5" fill="#7fa56b"/>
            <circle cx="58" cy="19.8" r="2" fill="#fff"/><circle cx="58.6" cy="19.8" r="1" fill="#1b1b1b"/>
            <path d="M52 27.5 Q55.5 29.5 59 27.5" stroke="#3d5a30" stroke-width="1.2" fill="none" stroke-linecap="round"/>
            <path d="M9 31 Q9 7 29 7 Q49 7 49 31 Z" fill="<?= $__color ?>"/>
            <path d="M29 7 V31 M19 11 L21.5 31 M39 11 L36.5 31" stroke="rgba(0,0,0,.28)" fill="none" stroke-width="1.6"/>
            <path d="M14 20 Q29 14 44 20" stroke="rgba(255,255,255,.35)" fill="none" stroke-width="1.6"/>
          </svg>
        </div>
      </div>
    </div>
<?php endforeach; ?>

    <div class="control">
      <button type="button" id="btn-repetir">▶ Repetir</button>
      <button type="button" id="btn-final" class="sec">⏭ Anar al final</button>
      <button type="button" id="btn-nova" class="sec">🎲 Nova cursa</button>
      <span class="ronda" id="ronda">Ronda 0 / 0</span>
    </div>
    <div class="barra"><div id="barra"></div></div>
    <div class="narrador">
      <span class="mic" aria-hidden="true">🎙️</span>
      <p id="frase" aria-live="polite"></p>
    </div>
  </section>

  <section id="resultat" class="targeta" hidden aria-label="Resultat final">
    <div class="guanyadora-text" id="guanyadora-text"></div>
    <div class="podi" id="podi"></div>
    <table>
      <thead><tr><th>Tortuga</th><th>Caselles</th><th>💤 Dormides</th><th>🚀 Turbos</th></tr></thead>
      <tbody id="taula"></tbody>
    </table>
  </section>
<?php else: ?>
  <header>
    <h1>🐢 La cursa de tortugues</h1>
    <p class="sub">Encara no es pot dibuixar la cursa.</p>
  </header>
  <div class="bloqueig">
    <strong>Falten dades o tenen un format incorrecte.</strong>
    Corregeix els errors marcats amb ✖ a la llista de comprovacions d'aquí sota i torna a carregar la pàgina.
  </div>
<?php endif; ?>

  <details class="comprovacions <?= $__errors > 0 ? 'hi-ha-errors' : '' ?>" <?= ($__errors > 0 || !$__dibuixar) ? 'open' : '' ?>>
    <summary>
      <?php if ($__errors === 0 && $__avisos === 0): ?>
        ✔ Comprovacions: tot correcte (<?= $__oks ?>)
      <?php else: ?>
        Comprovacions: <?= $__oks ?> correctes · <?= $__avisos ?> avisos · <?= $__errors ?> errors
      <?php endif; ?>
    </summary>
    <ul>
      <?php foreach ($__checks as $__c): ?>
        <li class="<?= $__h($__c['nivell']) ?>"><?= $__h($__c['text']) ?></li>
      <?php endforeach; ?>
    </ul>
  </details>
</main>

<?php if ($__dibuixar): ?>
<script>
(function () {
  const D = <?= $__json ?>;
  const N = D.historial.length;
  const frase = document.getElementById('frase');
  const comptador = document.getElementById('ronda');
  const barra = document.getElementById('barra');
  const resultat = document.getElementById('resultat');
  const tortugues = D.noms.map((nom, i) => ({
    nom: nom,
    el: document.getElementById('t' + i),
    carril: document.getElementById('c' + i)
  }));
  const MS_PER_RONDA = 1100;
  let timer = null;

  function posicions(k) {
    return k === 0 ? D.noms.map(() => 0) : D.historial[k - 1];
  }

  function pintar(k) {
    const ara = posicions(k);
    const abans = posicions(Math.max(k - 1, 0));
    tortugues.forEach((t, i) => {
      const p = Math.min(ara[i], D.meta) / D.meta;
      t.el.style.left = 'calc((100% - 70px) * ' + p + ')';
      t.el.classList.toggle('dorm', k > 0 && ara[i] === abans[i]);
      t.carril.classList.remove('guanyadora');
    });
    comptador.textContent = 'Ronda ' + k + ' / ' + N;
    barra.style.width = (k / N * 100) + '%';
    frase.textContent = k === 0 ? 'Les tortugues són a la línia de sortida... Preparades? Llestes?' : D.narracio[k - 1];
  }

  function acabar() {
    const guanyadora = D.classificacio[0].nom;
    tortugues.forEach(t => t.carril.classList.toggle('guanyadora', t.nom === guanyadora));
    document.getElementById('guanyadora-text').textContent = '🏆 Guanya ' + guanyadora + '!';
    const medalles = ['🥇', '🥈', '🥉'];
    const ordre = [1, 0, 2];
    const podi = document.getElementById('podi');
    podi.innerHTML = '';
    ordre.forEach(idx => {
      const c = D.classificacio[idx];
      if (!c) { return; }
      const d = document.createElement('div');
      d.className = 'lloc p' + (idx + 1);
      const nom = document.createElement('div'); nom.className = 'nom'; nom.textContent = c.nom;
      const bloc = document.createElement('div'); bloc.className = 'bloc'; bloc.textContent = medalles[idx];
      const pos = document.createElement('div'); pos.className = 'pos'; pos.textContent = c.posicio + ' caselles';
      d.appendChild(nom); d.appendChild(bloc); d.appendChild(pos);
      podi.appendChild(d);
    });
    const taula = document.getElementById('taula');
    taula.innerHTML = '';
    D.classificacio.forEach(c => {
      const s = D.estadistiques.find(x => x.nom === c.nom);
      const tr = document.createElement('tr');
      [c.nom, c.posicio, s.dormides, s.turbos].forEach(v => {
        const td = document.createElement('td'); td.textContent = v; tr.appendChild(td);
      });
      taula.appendChild(tr);
    });
    resultat.hidden = false;
  }

  function aturar() { if (timer !== null) { clearInterval(timer); timer = null; } }

  function reproduir() {
    aturar();
    resultat.hidden = true;
    let r = 0;
    pintar(0);
    timer = setInterval(() => {
      r++;
      pintar(r);
      if (r >= N) { aturar(); acabar(); }
    }, MS_PER_RONDA);
  }

  function anarAlFinal() {
    aturar();
    pintar(N);
    acabar();
  }

  document.getElementById('btn-repetir').addEventListener('click', reproduir);
  document.getElementById('btn-final').addEventListener('click', anarAlFinal);
  document.getElementById('btn-nova').addEventListener('click', () => location.reload());
  pintar(0);
  setTimeout(reproduir, 700);
})();
</script>
<?php endif; ?>
</body>
</html>

visual.php s'està mostrant.