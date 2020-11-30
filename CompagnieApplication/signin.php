<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php header('Content-Type: charset=utf-8'); ?>
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
	$erreur=False;
	$message="";
	if (isset($_POST['submit'])){
		if (isset($_POST['email']) and isset($_POST['passWord'])){
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$domain= explode("@",$_POST['email'])[1];
				if (!checkdnsrr($domain,"MX")){
						$message="Email invalide";
					$erreur=True;
				}
				else{
					$email=$_POST['email'];
					$mysqli = new mysqli("db", "root", "root", "bd");
					if ($mysqli->connect_errno) {
					echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
					}
					$mail=$mysqli->real_escape_string($email);
					
					$result=$mysqli->query("select mot_de_passe, idUtilisateur FROM utilisateur WHERE email='$mail';");	
										
					if ($result->num_rows <=0){
						$erreur=True;
					}
					else {
						$row=$result->fetch_assoc();
						if($_POST['passWord'] == $row['mot_de_passe']){	
							
							$idUser=$row['idUtilisateur'];
							$auto=$mysqli->query("select * FROM utilisateur_roles WHERE Id_utilisateur=$idUser;");
							while($rowAuto=mysqli_fetch_row($auto)){
							debug_to_console($rowAuto[1]);
							if($rowAuto[1]!=0){
							header("location: http://localhost:8001/passagerView.php?idPassager=$idUser");
							ob_end_flush();
														}
						if($rowAuto[1]==0){
							header("location: http://localhost:8001/adminView.php");
							ob_end_flush();
											}
						}}
						else {$erreur=True;
						$message="Mot de passe incorrect";
						}
					}
				}
			}
			else { 
				$erreur=True;
				$message="Email invalide";
			}
		}
		else $erreur=true;
		if($erreur){
		}
	}
?>


	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Se connecter / S'inscrire</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connectez-vous à votre compte</h3>
							<p class="text-center text-muted">Connectez-vous en quelques secondes !</p>
							<hr>
							
							<form action="signin.php" method="post">
							<?php echo $message;?>
								<div class="top-margin">

									<label>Adresse mail Utilisateur <span class="text-danger">*</span></label>
									<input type="email" class="form-control" name="email">
								</div>
								<div class="top-margin">
									<label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" name="passWord">
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<b><a href="">Mot de passe oublié?</a></b>
									</div>
									<div class="col-lg-4 text-right">
										<input class="form-control btn btn-success" type="submit" value="Se connecter" name="submit"></input>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3 class="thin text-center">Inscrivez-vous </h3>
								<button class="signup" type="submit"> <a class="signuplien" href="signup.php">S'inscrire</a></button>
							</div>
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