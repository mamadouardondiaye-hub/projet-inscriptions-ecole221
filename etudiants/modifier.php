<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../fonction_utilisable.php';
require_once __DIR__ . '/lister.php';

function modifierEtudiant() {
    afficherTitre("MODIFIER UN ÉTUDIANT");
    
    $donnees = lireDonnees();
    
    if (count($donnees['etudiants']) == 0) {
        afficherErreur("Aucun étudiant à modifier !");
        return;
    }
    
    listerEtudiants();
    
    echo "\nEntrez l'ID de l'étudiant à modifier : ";
    $id = (int)trim(fgets(STDIN));
    
    $trouve = false;
    for ($i = 0; $i < count($donnees['etudiants']); $i++) {
        if ($donnees['etudiants'][$i]['id'] == $id) {
            $trouve = true;
            
            echo "\n(Laissez vide pour garder la valeur actuelle)\n";
            
            echo "Nom (" . $donnees['etudiants'][$i]['nom'] . ") : ";
            $nom = trim(fgets(STDIN));
            if ($nom != "") {
                $donnees['etudiants'][$i]['nom'] = $nom;
            }
            
            echo "Prénom (" . $donnees['etudiants'][$i]['prenom'] . ") : ";
            $prenom = trim(fgets(STDIN));
            if ($prenom != "") {
                $donnees['etudiants'][$i]['prenom'] = $prenom;
            }
            
            echo "Email (" . $donnees['etudiants'][$i]['email'] . ") : ";
            $email = trim(fgets(STDIN));
            if ($email != "") {

                $emailExiste = false;
                foreach ($donnees['etudiants'] as $e) {
                    if ($e['email'] == $email && $e['id'] != $id) {
                        $emailExiste = true;
                        break;
                    }
                }
                
                if ($emailExiste) {
                    afficherErreur("Cet email existe déjà !");
                    return;
                }
                
                $donnees['etudiants'][$i]['email'] = $email;
            }
            
            sauvegarderDonnees($donnees);
            afficherSucces("Étudiant modifié !");
            return;
        }
    }
    
    if (!$trouve) {
        afficherErreur("Aucun étudiant avec l'ID $id !");
    }
}
?>