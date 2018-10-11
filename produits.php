<?php
/*
Affiche les produits selon des critères
de recherche : 
id_categorie (les produits doivent être de cette catégorie),
prix_actuel (la plus forte enchère sur ce produit doit être au plus égale à ce prix),
date_limite (la date butoir du produit doit être précisément cette date).

Nous n'avons écrit pour l'instant que
le CONTRÔLE des paramètres, avec une
VUE minimale.
*/
$id_categorie = filter_input(INPUT_GET, "id_categorie", FILTER_VALIDATE_INT);

$prix_actuel = filter_input(INPUT_GET,
"prix_actuel", FILTER_VALIDATE_FLOAT);

$date_limite = filter_input(INPUT_GET,"date_limite");

$ok = true; // nous supposons que les parametres sont ok
if ($id_categorie === false) {
	echo "id_categorie doit être entier<br/>";
	$ok = false;
}
if ($prix_actuel === false) {
	echo "prix_actuel doit être un flottant<br/>";
	$ok = false;
}
if ($date_limite !== null
	&& (!preg_match("/^(\d{2})-(\d{2})-(\d{4})$/", $date_limite, $eles)
	|| !checkdate($eles[2], $eles[1], $eles[3]))) {
		$date_limite = false;
	echo "date_limite doit être au format jj-mm-aaaa";
	$ok = false;
}
if ($ok) {
?>
<p>Vos critères sont :</p>
<ul>
	<li>id_categorie : 
	<?= $id_categorie?></li>
	<li>prix_actuel : 
	<?= $prix_actuel?></li>
	</li>
	<li>date_limite : 
	<?= $date_limite?></li>
	</li>
</ul>
<?php
}
?>
<p>Ex :
<a href="http://localhost/exercices/produits.php?id_categorie=abc&prix_actuel=azerty&date_limite=10-2018">
http://localhost/exercices/produits.php?id_categorie=abc&prix_actuel=azerty&date_limite=10-2018</a></p>
<a href="http://localhost/exercices/produits.php?id_categorie=123&prix_actuel=100&date_limite=02-10-2018">
http://localhost/exercices/produits.php?id_categorie=123&prix_actuel=100&date_limite=02-10-2018</a></p>

<a href="http://localhost/exercices/produits.php?date_limite=03-10-2018">Produits de date limite demain</a>
</p>