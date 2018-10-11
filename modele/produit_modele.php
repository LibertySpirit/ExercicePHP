<?php
require_once("DB.php");

function getProduit($id_produit) {
	$db = DB::getConnection();
	$sql = "
		SELECT *
		FROM 
			produit p
				INNER JOIN
			categorie c ON p.id_categorie = c.id_categorie
		WHERE p.id_produit = :id_produit";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(":id_produit", $id_produit);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Recupere les encheres du produit de id $id_produit
function getEncheresByIdProduit($id_produit) {
	$db = DB::getConnection();
	$sql = "
		SELECT *
		FROM enchere
		WHERE id_produit = :id_produit";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(":id_produit", $id_produit);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}