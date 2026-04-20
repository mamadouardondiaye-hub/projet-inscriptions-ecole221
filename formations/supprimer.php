<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../fonction_utilisable.php';
require_once __DIR__ . '/lister.php';

function supprimerFormation() {
    afficherTitre("SUPPRIMER UNE FORMATION");
    
    $donnees = lireDonnees();
    
    if (count($donnees['formations']) == 0) {
        afficherErreur("Aucune formation à supprimer !");
        return;
    }
    
    listerFormations();
    
    echo "\nEntrez l'ID de la formation à supprimer : ";
    $id = (int)trim(fgets(STDIN));
    
    echo "Confirmer la suppression ? (oui/non) : ";
    $confirmation = trim(fgets(STDIN));
    
    if ($confirmation != "oui") {
        echo "\nSuppression annulée.\n";
        return;
    }
    
    $nouvelleListe = [];
    $trouve = false;
    
    foreach ($donnees['formations'] as $f) {
        if ($f['id'] != $id) {
            $nouvelleListe[] = $f;
        } else {
            $trouve = true;
        }
    }
    
    if (!$trouve) {
        afficherErreur("Aucune formation avec l'ID $id !");
        return;
    }
    
    $donnees['formations'] = $nouvelleListe;
    sauvegarderDonnees($donnees);
    
    afficherSucces("Formation supprimée !");
}
?>