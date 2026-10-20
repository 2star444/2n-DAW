<?php

function buscaAlumne($id): ?string
{
    if ($id === 1) {
        return "Laia";
    }

    return null;
}

echo "Alumne amb id 1: " . buscaAlumne(1) . "\n";
echo "Alumne amb id 2 (null es mostra buit amb echo): [" . buscaAlumne(2) . "]\n";