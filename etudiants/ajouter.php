<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../fonction_utilisable.php';

function ajouterEtudiant() {
    afficherTitre("AJOUTER UN ÉTUDIANT");
    
    echo "Nom : ";
    $nom = trim(fgets(STDIN));
    
    echo "Prénom : ";
    $prenom = trim(fgets(STDIN));
    
    echo "Email : ";
    $email = trim(fgets(STDIN));
    
    if ($nom == "") {
        afficherErreur("Le nom est obligatoire !");
        return;
    }
    
    if ($prenom == "") {
        afficherErreur("Le prénom est obligatoire !");
        return;
    }
    
    if ($email == "") {
        afficherErreur("L'email est obligatoire !");
        return;
    }
    
    $donnees = lireDonnees();
    
    foreach ($donnees['etudiants'] as $etudiant) {
        if ($etudiant['email'] == $email) {
            afficherErreur("Cet email existe déjà !");
            return;
        }
    }
    
    $nouvelId = count($donnees['etudiants']) + 1;
    $nouvelEtudiant = [
        'id' => $nouvelId,
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email
    ];
    
    $donnees['etudiants'][] = $nouvelEtudiant;
    sauvegarderDonnees($donnees);
    
    afficherSucces("L'étudiant $prenom $nom a été ajouté !");
}
?>