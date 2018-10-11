<?php
require_once("en-tete.php");

if ($initError != null) {
?>
		<h1><?= $initError ?></h1>
		<p>Exemple de bon usage&nbsp;
			<a href="vendeur.php?id_vendeur=1">vendeur.php?id_vendeur=1</a>
		</p>
<?php	
}
else {
	if ($vendeur == null) {
		die("<h1>Participant introuvable</h1>");
	}
	else {
?>
	<p>Participant trouvé :
	<?= $vendeur["prenom"] ?>, <?= $vendeur["nom"] ?>
    </p>
	
<?php
		if (count($produitVendus) == 0) { // Pas d'encheres
?>	
	<p>Pas encore de produits proposés</p>
<?php
		} else {
			// boucler sur les encheres
?>
	<table>
        <caption>Produits proposés :</caption>
		<tr>
			<th>Description</th>
			<th>Mise à prix</th>
			<th>Date butoir</th>
		</tr>
<?php
			foreach ($produitVendus as $produitVendus) {
?>
		<tr>
			<td><?= $produitVendus["description"]?></td>
			<td><?= $produitVendus["mise_a_prix"] ?></td>
			<td><?= $produitVendus["date_butoir"] ?></td>
		</tr>
<?php				
			}
?>
	</table>
<?php
		}
	}
}
