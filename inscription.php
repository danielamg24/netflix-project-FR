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
	// Permet d'utiliser le contenu de ces feuilles. 
		include('./src/header.php'); 
		include('connect.php');
	?>
	
	<section>
		<div id="login-body">
			<h1>S'inscrire</h1>

			<?php

			// Vérifier si les variables du formulaire ($_POST) existent  

			if (isset ($_POST['email'])&& isset($_POST['password']) && isset($_POST['password_two'])) {
					// echo $_POST['email']; 
				$email=$_POST['email'];
				$password=$_POST['password'];
				$password_two=$_POST['password_two'];
				
				if ($password == $password_two) {
					// Encryption en sha1()
					$password = sha1($password);
				}else {
					echo '<p class="alert error">Les mots de passe ne coresspondent pas.</p>';
				}
				
			}


			// On verifie si email et password ne sont pas vides. 
			
			if (!empty($email) && !empty($password)) {
				
				// On prepare l'insertion des données du formulaire
				$requete = $db->prepare('INSERT INTO users(email,password) VALUES (?,?)');
				
				// Execution de la requête préparée avec les valeurs qui correspondent aux (?,?)
				$requete->execute(array($email,$password));
				echo '<p class = "alert success">Inscription réussie !</p>' ;
			}
			
			?>

			<form method="post" action="inscription.php">
				<input type="email" name="email" placeholder="Votre adresse email" required />
				<input type="password" name="password" placeholder="Mot de passe" required />
				<input type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
				<button type="submit">S'inscrire</button>
			</form>

			<p class="grey">Déjà sur Netflix ? <a href="index.php">Connectez-vous</a>.</p>
		</div>
	</section>
	

	<?php include('./src/footer.php'); ?>
</body>
</html>