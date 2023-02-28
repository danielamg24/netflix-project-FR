<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Netflix</title>
	<link rel="stylesheet" type="text/css" href="design/default.css">
	<link rel="icon" type="image/pngn" href="img/favicon.png">
</head>
<body>

	<?php 
	include('src/header.php'); 
	include('connect.php')
	
	?>
	
	<section>
		<div id="login-body">
				<h1>S'identifier</h1>

				<?php

					if (isset($_POST['email']) && isset($_POST['password'])) {
						$mail= $_POST ['email'];
						$password= $_POST ['password'];
						
						// echo $mail; 
					$requete=$db->prepare('SELECT * FROM users WHERE email= ?');
					$requete->execute(array($mail));

					while ($users = $requete->fetch()) {
						$mail_bdd= $users['email'];
						$password_bdd = $users['password'];
					}
					// echo '<p class="alert error">Test !</p>' ; 
					if (sha1($password) == $password_bdd) {
						echo '<p class="alert success">Bienvenue sur Netflix !</p>' ; 
						
					}else {
						echo '<p class="alert error">La combinaison est incorrecte.</p>' ;
					}

					}


				?>

				<form method="post" action="index.php">
					<input type="email" name="email" placeholder="Votre adresse email" required />
					<input type="password" name="password" placeholder="Mot de passe" required />
					<button type="submit">S'identifier</button>
					<label id="option"><input type="checkbox" name="auto" checked />Se souvenir de moi</label>
				</form>
			

				<p class="grey">Première visite sur Netflix ? <a href="inscription.php">Inscrivez-vous</a>.</p>
		</div>
	</section>

	<?php include('src/footer.php'); ?>
</body>
</html>