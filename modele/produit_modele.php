<?php
// Inclure le code de DB.php
require_once("DB.php");

// Recupere le produit de id $id_produit
function get($id_produit) {
	// Obtenir une connexion à la base
	$db = DB::getConnection();
	// Requete SQL avec une partie variable (:id_produit)
	$sql = "
		SELECT *
		FROM 
			produit p
				INNER JOIN
			categorie c ON p.id_categorie = c.id_categorie
		WHERE p.id_produit = :id_produit";
	// Compiler la requete et la recuperer			
	$stmt = $db->prepare($sql);
	// Donner a la partie variable la valeur de $id_produit
	$stmt->bindValue(":id_produit", $id_produit);
	// Executer la requete SQL, qui renvoie 0 ou 1 ligne
	$stmt->execute();
	// Retourner la ligne sous la forme d'un tableau associatif
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Recupere les encheres du produit de id $id_produit
function getEncheresByIdProduit($id_produit) {
	// Obtenir une connexion à la base
	$db = DB::getConnection();
	// Requete SQL avec une partie variable (:id_produit)
	$sql = "
		SELECT *
		FROM enchere
		WHERE id_produit = :id_produit";
	// Compiler la requete et la recuperer			
	$stmt = $db->prepare($sql);
	// Donner a la partie variable la valeur de $id_produit
	$stmt->bindValue(":id_produit", $id_produit);
	// Executer la requete SQL, qui renvoie 0 ou 1 ligne
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}