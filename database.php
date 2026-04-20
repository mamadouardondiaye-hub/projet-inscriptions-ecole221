<?php

$fichierData = __DIR__ . '/data.txt';

function lireDonnees() {
    global $fichierData;
    
    if (!file_exists($fichierData)) {
        return ['etudiants' => [], 'formations' => []];
    }
    
    $contenu = file_get_contents($fichierData);
    
    if (empty($contenu)) {
        return ['etudiants' => [], 'formations' => []];
    }
    
    $donnees = unserialize($contenu);
    
    if (!isset($donnees['etudiants']) || !isset($donnees['formations'])) {
        return ['etudiants' => [], 'formations' => []];
    }
    
    return $donnees;
}
function sauvegarderDonnees($donnees) {
    global $fichierData;
    
    if (!isset($donnees['etudiants'])) {
        $donnees['etudiants'] = [];
    }
    if (!isset($donnees['formations'])) {
        $donnees['formations'] = [];
    }
    
    $contenu = serialize($donnees);
    file_put_contents($fichierData, $contenu);
}
?>