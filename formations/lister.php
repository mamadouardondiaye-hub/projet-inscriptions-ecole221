<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../fonction_utilisable.php';

function listerFormations() {
    afficherTitre("LISTE DES FORMATIONS");
    
    $donnees = lireDonnees();
    
    if (count($donnees['formations']) == 0) {
        echo "Aucune formation pour le moment.\n";
        return;
    }
    
    printf("%-5s %-30s %-40s\n", "ID", "TITRE", "DESCRIPTION");
    separateur();
    
    foreach ($donnees['formations'] as $f) {
        $description = $f['description'];
        if ($description == "") {
            $description = "(Pas de description)";
        }
        printf("%-5s %-30s %-40s\n", $f['id'], $f['titre'], $description);
    }
    
    echo "\nTotal : " . count($donnees['formations']) . " formation(s)\n";
}
?>