<?php

// exercici18.php

$lletra = 'K'; 


switch ($lletra) {
    case 'A': case 'B': case 'C': case 'D':
    case 'E': case 'F': case 'G': case 'H':
        $grup = "Grup A";
        break;

    case 'I': case 'J': case 'K': case 'L':
    case 'M': case 'N': case 'O': case 'P':
        $grup = "Grup B";
        break;

    case 'Q': case 'R': case 'S': case 'T':
        case 'U': case 'V': case 'W': case 'X':
        case 'Y': case 'Z':
        $grup = "Grup C";
        break;

    default:
        $grup = "cap grup (el caràcter no és una lletra vàlida)";
        break;
}

echo "La lletra '$lletra' ha estat assignada al: $grup.";