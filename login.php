<?php
/* Connect or disconnect a user.
 * The user interface is minimal.
 */
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    do_get();
} else {
    do_post();
}

// Controler for get
function do_get() {
	$user = array_key_exists("user", $_SESSION) ? $_SESSION["user"] : null;
	$login = null;
	$msg = null;
	display_form($user, $login, $msg);
}

// Controler for post
function do_post() {
	$user = null;
	$login = null;
	$msg = null;
	require_once "modele/vendeur_modele.php";
	if (array_key_exists("action", $_POST) && $_POST["action"] == "disconnect") {
		$_SESSION = array();
		session_destroy();
	} else {
		$login = $_POST["email"];
		$password = $_POST["password"];
		if (empty($login) || empty($password)) {
			$msg = "fields must be filled";
		} else {
			$user = PersonModel::getByLoginPassword($login, $password);
			if ($user != null) {
				$_SESSION["user"] = $user;
			} else {
				$msg = "Invalid password or user unknow";
			}
		}
	}
	display_form($user, $login, $msg);
}
