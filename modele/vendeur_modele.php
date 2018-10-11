<?php
require_once("DB.php");

class PersonModel {
	function getParticipant($id_vendeur) {
		$db = DB::getConnection();
		$sql = "SELECT *
			FROM participant
			WHERE id_participant = :id_participant";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":id_participant", $id_vendeur);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	// Recupere les encheres du produit de id $id_participant

	public static function getProduitByIdVendeur($id_vendeur) {
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

	public static function getByLoginPassword($login, $password) {
		$db = DB::getConnection();
		$sql = "SELECT id_participant, email, password
			FROM participant
			WHERE email = :email AND password = :password";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":email", $login);
		$stmt->bindValue(":password", $password);
		$ok = $stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}
?>