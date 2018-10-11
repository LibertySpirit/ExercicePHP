<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="main.css"/>
	</head>
	<body class="flex-center">
<header>Ici le menu commun à toutes les pages</header>
<hr/>
<?php
function display_form($user, $login, $msg) {
	?>
	<html>
		<head>
			<style>
				.error {
					color: red;
				}
			</style>
		</head>
		<body>
			<form method="POST">
				<?php
				if ($user != null) {
					?>
					<button type="submit" name="action" value="disconnect">Disconnect
						<?= $user["email"] ?></button>
					<?php
				} else {
					?>
					Login: <input type="text" name="email" value="<?= $login ?>"/>
					Password: <input type = "password" name = "password"/>
					<button type="submit">Connect</button>
					<?php
					if ($msg != null) {
					?>	
					<span class="error"><?= $msg ?></span>
					<?php
					}
				}
				?>
			</form>
		</body>
	</html>
	<?php
} ?>