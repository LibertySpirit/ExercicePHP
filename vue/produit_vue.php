<?php
// Vue de la page du produit
// Données : $produit, $encheres
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="static/style.css"/>
	</head>
	<body>
<?php
// Afficher l'en-tete commune a toutes les pages
require_once("en-tete.php");
if ($initError != null) {
?>
		<h1><?= $initError ?></h1>
		<p>Exemple de bon usage&nbsp;
			<a href="produit.php?id_produit=1">produit.php?id_produit=1</a>
		</p>
<?php	
}
else {
	if ($produit == null) {
		die("<h1>produit introuvable</h1>");
	}
	else {
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
