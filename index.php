<?php

$password = readline("Inserire password: ");

echo "Password inserita: " . $password . "\n";

function checkLength($psw){
    if(strlen($psw) >= 8){
        return true;
    }else{
        echo "La password inserita è lunga " . strlen($psw) . " caratteri, ma deve contenerne almeno 8!\n";
        return false;
    }
};

function checkNumber($psw){
    for($i = 0; $i < strlen($psw); $i++){
        if(is_numeric($psw[$i])){
            return true;
        }
    }
    echo "La tua password deve contenere ALMENO un numero, riprova!\n";
    return false;
};

function checkUpper($psw){
    for($i = 0; $i < strlen($psw); $i++){
        if(ctype_upper($psw[$i])){
            return true;
        }
    }
    echo "La tua password deve contenere ALMENO una lettera maiuscola, riprova!\n";
    return false;
};

const SPECIAL_CHARS = ["!", "@", "#", "$"];

function checkSpecial($psw){
    
    for($i = 0; $i < strlen($psw); $i++){
        if(in_array($psw[$i], SPECIAL_CHARS)){
            return true;
        }
    }
    echo "La tua password deve contenere ALMENO un carattere speciale, riprova!\n";
    return false;
};

function checkPassword($psw){
    $first_rule = checkLength($psw);
    $second_rule = checkNumber($psw);
    $third_rule = checkUpper($psw);
    $fourth_rule = checkSpecial($psw);

    if($first_rule && $second_rule && $third_rule && $fourth_rule){
        echo "Password accettata\n";
    }
    return $first_rule && $second_rule && $third_rule && $fourth_rule;
    echo("La password non rispetta la regola ...\n");
};

checkPassword($password);

do{
    $password = readline("Inserire password: ");
}while(!checkPassword($password));


?>