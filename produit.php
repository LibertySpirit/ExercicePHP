<?php
// Affiche le produit de id specifié dans id_produit, en MVC
// Le contrôleur (ce fichier) contrôle et coordonne modèle et vue
// Il appelle le modele pour acceder a la base de donnees
// Il delegue ensuite l'affichage a la vue


// Y a-t-il une erreur a l'appel (parametre manquant ou incorrect)
$initError = null;
// Le produit trouve
$produit = null;
// Les encheres trouvees sur le produit
$encheres = null; // Pas d'enchere a donner a la vue


// recupere le parametre "id_produit" en verifiant
// qu'il est entier
$id_produit = filter_input(INPUT_GET, "id_produit", FILTER_VALIDATE_INT);
if ($id_produit === null // pas de valeur
	|| $id_produit == false) { // pas un entier
	$initError = "id_produit doit être spécifié et entier";
}
else {
	// Appel au modele
	require_once("modele/produit_modele.php");
	// Recuperer le produit de id demande
	$produit = get($id_produit);
	if ($produit != null) {
		$encheres = getEncheresByIdProduit($id_produit);
	}
}
// Appel a la vue
include_once("vue/produit_vue.php");
