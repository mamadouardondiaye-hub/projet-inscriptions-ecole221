<?php

require_once __DIR__ . '/fonction_utilisable.php';
require_once __DIR__ . '/database.php';

require_once __DIR__ . '/etudiants/ajouter.php';
require_once __DIR__ . '/etudiants/lister.php';
require_once __DIR__ . '/etudiants/modifier.php';
require_once __DIR__ . '/etudiants/supprimer.php';

require_once __DIR__ . '/formations/creer.php';
require_once __DIR__ . '/formations/lister.php';
require_once __DIR__ . '/formations/modifier.php';
require_once __DIR__ . '/formations/supprimer.php';
require_once __DIR__ . '/formations/consulter.php';

$fichierData = __DIR__ . '/data.txt';
if (file_exists($fichierData)) {
    $test = @unserialize(file_get_contents($fichierData));
    if ($test === false && file_get_contents($fichierData) != "") {
        echo "\n  L'ancien fichier de données est corrompu.\n";
        echo " Suppression et recréation d'un nouveau fichier...\n";
        unlink($fichierData);
    }
}
function menuGestionnaire() {
    while (true) {
        echo "\n";
        echo "=========================================\n";
        echo "      ESPACE GESTIONNAIRE\n";
        echo "=========================================\n";
        echo "\n--- GESTION DES ÉTUDIANTS ---\n";
        echo "1 - Ajouter un étudiant\n";
        echo "2 - Lister les étudiants\n";
        echo "3 - Modifier un étudiant\n";
        echo "4 - Supprimer un étudiant\n";
        echo "\n--- GESTION DES FORMATIONS ---\n";
        echo "5 - Créer une formation\n";
        echo "6 - Modifier une formation\n";
        echo "7 - Supprimer une formation\n";
        echo "8 - Lister les formations\n";
        echo "\n0 - Retour au menu principal\n";
        echo "\nVotre choix : ";
        
        $choix = trim(fgets(STDIN));
        
        if ($choix == "1") {
            ajouterEtudiant();
        }
        elseif ($choix == "2") {
            listerEtudiants();
        }
        elseif ($choix == "3") {
            modifierEtudiant();
        }
        elseif ($choix == "4") {
            supprimerEtudiant();
        }
        elseif ($choix == "5") {
            creerFormation();
        }
        elseif ($choix == "6") {
            modifierFormation();
        }
        elseif ($choix == "7") {
            supprimerFormation();
        }
        elseif ($choix == "8") {
            listerFormations();
        }
        elseif ($choix == "0") {
            break;
        }
        else {
            afficherErreur("Choix invalide !");
        }
        
    }
}
function menuEtudiant() {
    while (true) {
        echo "\n";
        echo "=========================================\n";
        echo "        ESPACE ÉTUDIANT\n";
        echo "=========================================\n";
        echo "1 - Consulter les formations\n";
        echo "0 - Retour au menu principal\n";
        echo "\nVotre choix : ";
        
        $choix = trim(fgets(STDIN));
        
        if ($choix == "1") {
            consulterFormations();
        }
        elseif ($choix == "0") {
            break;
        }
        else {
            afficherErreur("Choix invalide !");
        }
    
    }
}

while (true) {
    echo "\n";
    echo "=========================================\n";
    echo "            MENU PRINCIPAL\n";
    echo "=========================================\n";
    echo "1 - Espace Gestionnaire (Administrateur)\n";
    echo "2 - Espace Étudiant\n";
    echo "0 - Quitter\n";
    echo "\nVotre choix : ";
    
    $choix = trim(fgets(STDIN));
    
    if ($choix == "1") {
        menuGestionnaire();
    }
    elseif ($choix == "2") {
        menuEtudiant();
    }
    elseif ($choix == "0") {
        echo "Au revoir !\n\n";
        break;
    }
    else {
        afficherErreur("Choix invalide ! Veuillez taper 1, 2 ou 0.");
    }
}
?>