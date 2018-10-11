<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="main.css"/>
		</head>
		<body class="flex-center">
		<header>
<?php
function display_form($user, $login, $msg) {
?>
			<form method="POST">
				<?php
				if ($user != null) {
					?>
					<button type="submit" name="action" value="disconnect">Disconnect
						<?= $user["nom"] ?></button>
					<?php
				} else {
					?>
					<div id="connect">
						Login: <input type="text" name="email" value="<?= $login ?>"/>
						Password: <input type = "password" name = "password"/>
						<button type="submit">Connect</button>
						<?php
						if ($msg != null) {
						?>	
						<span class="error"><?= $msg ?></span>
					</div>
					<?php
					}
				}
				?>
			</form>
			<nav>
				<ul>
					<li><a href="index.php" target="_blank" rel="noopener noreferrer">Accueil</a></li>
					<?php 
						if ($user != null) { ?>
							<li><a href="vendeur.php?id_vendeur=<?= $_SESSION['user']['id_participant'] ?>" target="_blank" rel="noopener noreferrer">Page de profile</a></li>
							<li><a href="ajouter_produit.php" target="_blank" rel="noopener noreferrer">Ajouter un produit</a></li>
						<?php
						}
					?>
				</ul>
			</nav>
			</header>
		</body>
	</html>
	<?php
} ?>