<!DOCTYPE html>
<html lang="en">
<head>
		<title>Industrious by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

<body class="is-preload">
		<!-- Header -->
		<header id="header">
				<a class="logo" href="index.php">Avianav</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="rechercher.php">Réservation de billet</a></li>
					<li><a href="signin.php">Connexion</a></li>
					<li><a href="signup.php">S'inscrire</a></li>
					<li><a href="contact.html">Contacter nous</a></li>
				</ul>
			</nav>
<?php
		function debug_to_console($data) {
			$output = $data;
			if (is_array($output))
				$output = implode(',', $output);

			echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
		}
?>
<?php
if (isset($_POST['submit'])){
	if (isset($_POST['nom']) and isset($_POST['prenom'])and isset($_POST['email'])and isset($_POST['passWord'])and isset($_POST['passWordConf'])){	
	$mysqli = new mysqli("db", "root", "root", "bd");
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$email=$_POST['email'];
			$password=$_POST['passWord'];
				if (!$resInsert=$mysqli->multi_query("CALL nouvel_utilisateur('$nom','$prenom','$email','$password',10)")) {
					echo "Echec lors de l'appel à la procédure stockée : (" . $mysqli->errno . ") " . $mysqli->error;
}
header("location: http://localhost:8001/CompagnieApplication/confirmationcompte.php?mail=$email&nom=$nom");
}}
			?>


	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">


		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Enregistrement</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Enregistrer un nouveau compte</h3>
							<p class="text-center text-muted">CRÉATION DE VOTRE COMPTE </p>
							<hr>

							<form  method="post">
								<div class="top-margin">
									<label>Nom</label>
									<input type="text" name="nom" class="form-control">
								</div>
								<div class="top-margin">
									<label>Prénom</label>
									<input type="text" name="prenom" class="form-control">
								</div>
								<div class="top-margin">
									<label>Email<span class="text-danger">*</span></label>
									<input type="email" name="email" class="form-control">
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Mot de passe <span class="text-danger">*</span></label>
										<input type="password" name="passWord" class="form-control">
									</div>
									<div class="col-sm-6">
										<label>Confirmer votre mot de passe<span class="text-danger">*</span></label>
										<input type="password" name="passWordConf" class="form-control">
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox"> 
											J'ai lu <a href="page_terms.html">les termes et conditions</a>
										</label>                        
									</div>
									<div class="col-12">
										<button class="button primary" name="submit" type="submit">Enregistrer</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+33 1548598520<br>
								<a href="mailto:#">centraleair@contact.com</a><br>
								<br>
								51 Chemin des Mouilles, Ecully 69130
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Nous contacter</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Service Relation Clientèle</h3>
						<div class="widget-body">
							<p>Nous sommes à votre écoute 24h/24, 7j/7 sur Messenger, Facebook et Twitter pour faciliter votre voyage. Nous vous aidons où que vous soyez ! #CentraleisintheAir</p>
							<p>Visionnez les dernières vidéos de la chaîne YouTube CentraleAir on air.
							Pinterest ou LinkedIn : quel que soit votre réseau préféré, dialoguez et partagez nos contenus avec d'autres internautes.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="index.php">Accueil</a> | 
								<a href="about.html">Informations</a> |
								<a href="contact.html">Contact</a> |
								<b><a href="signup.php">S'inscrire</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2019, CentraleAir. Designed by <a href="http://gettemplate.com/" rel="designer">Groupe Centrale</a> 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
		




		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>