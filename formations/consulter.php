<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../fonction_utilisable.php';

function consulterFormations() {
    afficherTitre("FORMATIONS DISPONIBLES");
    
    $donnees = lireDonnees();
    
    if (count($donnees['formations']) == 0) {
        echo "Aucune formation disponible pour le moment.\n";
        return;
    }
    
    echo "Voici les formations proposées :\n\n";
    
    foreach ($donnees['formations'] as $f) {
        echo "----------------------------------------\n";
        echo "FORMATION N°" . $f['id'] . "\n";
        echo "Titre : " . $f['titre'] . "\n";
        if ($f['description'] != "") {
            echo "Description : " . $f['description'] . "\n";
        }
        echo "----------------------------------------\n";
    }
    
    echo "\nTotal : " . count($donnees['formations']) . " formation(s) disponible(s)\n";
}
?>