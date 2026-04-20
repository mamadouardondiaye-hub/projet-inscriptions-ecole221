<?php

function afficherTitre($titre) {
    echo "\n=========================================\n";
    echo "  $titre\n";
    echo "=========================================\n";
}

function afficherErreur($message) {
    echo "\n ERREUR : $message\n";
}

function afficherSucces($message) {
    echo "\n SUCCÈS : $message\n";
}

function separateur() {
    echo "----------------------------------------\n";
}
?>