<?php

class DB {
	/** Fournit une connexion à la base encheres, en UTF-8 */
	public static function getConnection() {
		// DB configuration
		$db = "encheres";
		$dsn = "mysql:dbname=$db;host=localhost;charset=utf8";
		$user = "root";
		$password = "ERT123vbn"; // root avec MAMP et XAMPP
		// Get a DB connection with PDO library
		$bdd = new PDO($dsn, $user, $password);
		// Set communication in utf-8
		$bdd->exec("SET character_set_client = 'utf8'");
		// Throw the SQL exception
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $bdd;
	}

}
