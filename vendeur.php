<?php
$initError = null;
$vendeur = null;


$id_vendeur = filter_input(INPUT_GET, "id_vendeur", FILTER_VALIDATE_INT);
if ($id_vendeur === null // pas de valeur
	|| $id_vendeur == false) { // pas un entier
	$initError = "id_vendeur doit être spécifié et entier";
}
else {
	require_once("modele/vendeur_modele.php");
	// Recuperer le produit de id demande
    $vendeur = getParticipant($id_vendeur);
	if ($vendeur != null) {
        $produitVendus = getProduitByIdVendeur($id_vendeur);
	}
}
// Appel a la vue
include_once("vue/vendeur_vue.php");