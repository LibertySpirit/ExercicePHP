<?php
/*
Affiche le produit de id specifié dans id_produit
*/
// recupere le parametre "id_produit" en verifiant
// qu'il est entier
$id_produit = filter_input(INPUT_GET, "id_produit", FILTER_VALIDATE_INT);
if ($id_produit === null // pas de valeur
	|| $id_produit == false) { // pas un entier
	die("id_produit doit être spécifié et entier");
}
else {
	// Appel au modele
	require_once("modele/produit_modele.php");
	// Recuperer le produit de id demande
	$produit = get($id_produit);
	if ($produit == null) {
		die("produit introuvable");
	}
	else {
		$encheres = getEncheresByIdProduit($id_produit);
?>
	<p>Produit trouvé : 
	<?= $produit["description"] ?>
	(catégorie : <?= $produit["libelle"] ?>)
	<br/>
	Mis à prix le <?= $produit["date_entree"] ?>
	à <?= $produit["mise_a_prix"] ?> €</p>
	
<?php
		if (count($encheres) == 0) { // Pas d'encheres
?>	
	<p>Pas encore d'enchères sur ce produit</p>
<?php
		} else {
			// boucler sur les encheres
?>
	<p>Enchères :</p>
	<table>
		<tr>
			<th>Montant</th>
			<th>Date</th>
		</tr>
<?php
			foreach ($encheres as $enchere) {
?>
		<tr>
			<td><?= $enchere["montant"]?></td>
			<td><?= $enchere["instant"] ?></td>
		</tr>
<?php				
			}
?>
	</table>
<?php
		}
	}
}
