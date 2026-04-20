<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../fonction_utilisable.php';

function listerEtudiants() {
    afficherTitre("LISTE DES ÉTUDIANTS");
    
    $donnees = lireDonnees();
    
    if (count($donnees['etudiants']) == 0) {
        echo "Aucun étudiant pour le moment.\n";
        return;
    }
    
    printf("%-5s %-20s %-20s %-30s\n", "ID", "NOM", "PRÉNOM", "EMAIL");
    separateur();
    
    foreach ($donnees['etudiants'] as $e) {
        printf("%-5s %-20s %-20s %-30s\n", 
            $e['id'], $e['nom'], $e['prenom'], $e['email']);
    }
    
    echo "\nTotal : " . count($donnees['etudiants']) . " étudiant(s)\n";
}
?>