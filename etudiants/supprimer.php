<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../fonction_utilisable.php';
require_once __DIR__ . '/lister.php';

function supprimerEtudiant() {
    afficherTitre("SUPPRIMER UN ÉTUDIANT");
    
    $donnees = lireDonnees();
    
    if (count($donnees['etudiants']) == 0) {
        afficherErreur("Aucun étudiant à supprimer !");
        return;
    }
    
    listerEtudiants();
    
    echo "\nEntrez l'ID de l'étudiant à supprimer : ";
    $id = (int)trim(fgets(STDIN));
    
    echo "Confirmer la suppression ? (oui/non) : ";
    $confirmation = trim(fgets(STDIN));
    
    if ($confirmation != "oui") {
        echo "\nSuppression annulée.\n";
        return;
    }
    
    $nouvelleListe = [];
    $trouve = false;
    
    foreach ($donnees['etudiants'] as $e) {
        if ($e['id'] != $id) {
            $nouvelleListe[] = $e;
        } else {
            $trouve = true;
        }
    }
    
    if (!$trouve) {
        afficherErreur("Aucun étudiant avec l'ID $id !");
        return;
    }
    
    $donnees['etudiants'] = $nouvelleListe;
    sauvegarderDonnees($donnees);
    
    afficherSucces("Étudiant supprimé !");
}
?>