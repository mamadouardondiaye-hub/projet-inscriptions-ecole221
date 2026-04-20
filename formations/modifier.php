<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../fonction_utilisable.php';
require_once __DIR__ . '/lister.php';

function modifierFormation() {
    afficherTitre("MODIFIER UNE FORMATION");
    
    $donnees = lireDonnees();
    
    if (count($donnees['formations']) == 0) {
        afficherErreur("Aucune formation à modifier !");
        return;
    }
    
    listerFormations();
    
    echo "\nEntrez l'ID de la formation à modifier : ";
    $id = (int)trim(fgets(STDIN));
    
    $trouve = false;
    for ($i = 0; $i < count($donnees['formations']); $i++) {
        if ($donnees['formations'][$i]['id'] == $id) {
            $trouve = true;
            
            echo "\n(Laissez vide pour garder la valeur actuelle)\n";
            
            echo "Titre (" . $donnees['formations'][$i]['titre'] . ") : ";
            $titre = trim(fgets(STDIN));
            if ($titre != "") {
                $donnees['formations'][$i]['titre'] = $titre;
            }
            
            echo "Description (" . $donnees['formations'][$i]['description'] . ") : ";
            $description = trim(fgets(STDIN));
            if ($description != "") {
                $donnees['formations'][$i]['description'] = $description;
            }
            
            sauvegarderDonnees($donnees);
            afficherSucces("Formation modifiée !");
            return;
        }
    }
    
    if (!$trouve) {
        afficherErreur("Aucune formation avec l'ID $id !");
    }
}
?>