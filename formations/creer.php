<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../fonction_utilisable.php';

function creerFormation() {
    afficherTitre("CRÉER UNE FORMATION");
    
    echo "Titre de la formation : ";
    $titre = trim(fgets(STDIN));
    
    echo "Description (optionnelle) : ";
    $description = trim(fgets(STDIN));
    
    if ($titre == "") {
        afficherErreur("Le titre est obligatoire !");
        return;
    }
    
    $donnees = lireDonnees();
    
    $nouvelId = count($donnees['formations']) + 1;
    $nouvelleFormation = [
        'id' => $nouvelId,
        'titre' => $titre,
        'description' => $description
    ];
    
    $donnees['formations'][] = $nouvelleFormation;
    sauvegarderDonnees($donnees);
    
    afficherSucces("La formation \"$titre\" a été créée !");
}
?>