<?php
require_once("DB.php");

function getParticipant($id_vendeur) {
	$db = DB::getConnection();
	$sql = "
		SELECT nom, prenom
        FROM participant
        WHERE id_participant = :id_participant;";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(":id_participant", $id_vendeur);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Recupere les encheres du produit de id $id_participant

function getProduitByIdVendeur($id_vendeur) {
	$db = DB::getConnection();
	$sql = "SELECT p.description, p.mise_a_prix, p.date_butoir
            FROM produit p
	        INNER JOIN
                participant pr ON p.id_vendeur = pr.id_participant
                WHERE p.id_vendeur = :id_vendeur;";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(":id_vendeur", $id_vendeur);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>