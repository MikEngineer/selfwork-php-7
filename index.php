<?php

// Ripetere esercizio password implementando metodo che faccia reinserire psw quando anche una sola regola non viene rispettata, crearne uno che interrompa in caso di psw accettata. Fare visualizzare quale regola non viene rispettata

// Regole:
// 1. Lunga almeno 8
// 2. Almeno 1 numero
// 3. Almeno 1 maiuscolo
// 4. Almeno 1 speciale tra !, @, # e $

//Funzioni

$password = readline("Inserire password: ");

echo "Password inserita: " . $password . "\n";

const SPECIAL_CHARS = ["!", "@", "#", "$"];

function checkLength($psw) {
    if (strlen($psw) >= 8) {
        return true;
    } else {
        return "essere lunga almeno 8 caratteri.";
    }
}

function checkNumber($psw) {
    for ($i = 0; $i < strlen($psw); $i++) {
        if (is_numeric($psw[$i])) {
            return true;
        }
    }
    return "contenere almeno un numero.";
}

function checkUpper($psw) {
    for ($i = 0; $i < strlen($psw); $i++) {
        if (ctype_upper($psw[$i])) {
            return true;
        }
    }
    return "contenere almeno una lettera maiuscola.";
}

function checkSpecial($psw) {
    for ($i = 0; $i < strlen($psw); $i++) {
        if (in_array($psw[$i], SPECIAL_CHARS)) {
            return true;
        }
    }
    return "contenere almeno un carattere speciale.";
}

function checkPassword($psw) {
    $rules = [
        "Lunghezza" => checkLength($psw),
        "Numero" => checkNumber($psw),
        "Maiuscola" => checkUpper($psw),
        "Carattere Speciale" => checkSpecial($psw)
    ];

    foreach ($rules as $rule => $result) {
        if ($result !== true) {
            echo "La password deve $result\n";
            checkPassword($password);
            // return;
        }
    }

    echo "Password accettata\n";
}

checkPassword($password);


?>