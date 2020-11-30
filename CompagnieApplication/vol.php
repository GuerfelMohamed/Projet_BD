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
<?php
		function debug_to_console($data) {
			$output = $data;
			if (is_array($output))
				$output = implode(',', $output);

			echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
		}
?>
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

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<div class="row">
			<br></br>
			<!-- main content -->
			<?php
				$depart = $_GET['villesDepart'];
				$arrivee = $_GET['villesArrivee'];
				$datealler = $_GET['datealler'];
				$mysqli = new mysqli("db", "root", "root", "bd");
				 
				if (!$res=$mysqli->multi_query("CALL mon_vol('$depart','$arrivee','$datealler')")) {
					echo "Echec lors de l'appel à la procédure stockée : (" . $mysqli->errno . ") " . $mysqli->error;
				}
				 
				echo "<label>$depart - $arrivee</label>"; 
				do {
					if ($res = $mysqli->store_result()) {
						$arrayResult= $res->fetch_all();
						foreach($arrayResult as $result)
						{
						   echo  "<button class='collapsible'>Vol du $result[2]</button>";
						   echo "<div class='content'>";
						   echo "<br></br>";
						   echo "<p>Aéroport départ : $result[0]</p>";
						   echo "<p>Aéroport Destination : $result[1]</p>";
						   echo "<p>Heure Départ : $result[3]</p>";
						   echo "<p>Heure Arrivée : $result[4]</p>";
						   echo "<br></br>";
						   echo "<form method='post'><button class='selectvol' type='submit' name='submit'><a href='paiement.php?idDepart=$result[5]&depart=$depart&arrivee=$arrivee'>Sélectionner ce vol</a></button></form>";
						   echo "<br></br>";
						   echo "</div>";
						}
						
						$res->free();
					} else {
						if ($mysqli->errno) {
							echo "Echec de STORE : (" . $mysqli->errno . ") " . $mysqli->error;
						}
					}
				} while ($mysqli->more_results() && $mysqli->next_result());

			?>
			<!-- /end content -->
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
	<script>
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
	  coll[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var content = this.nextElementSibling;
		if (content.style.maxHeight){
		  content.style.maxHeight = null;
		} else {
		  content.style.maxHeight = content.scrollHeight + "px";
		} 
	  });
	}
	</script>
</body>
</html>