<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Billet</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/payment.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<?php
		function debug_to_console($data) {
			$output = $data;
			if (is_array($output))
				$output = implode(',', $output);

			echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
		}
?>
<?php
session_start();
session_destroy ();
		$id_Depart = $_GET['idDepart'];
		$nom=$_GET['nom'];
			$prenom=$_GET['prenom'];
			$passeport=$_GET['passeport'];
			$adresse=$_GET['adresse'];
		$mysqli = new mysqli("db", "root", "root", "bd");
		if (!$res=$mysqli->multi_query("CALL info_billet($id_Depart)")) {
					echo "Echec lors de l'appel à la procédure stockée : (" . $mysqli->errno . ") " . $mysqli->error;
				}
					if ($res = $mysqli->store_result()) {
						$arrayResult= $res->fetch_all();
						$row=$arrayResult[0];
						$aeroport_aller=$row[1];
						$aeroport_arrivee=$row[3];
						$ville_depart=$row[2];
						$ville_arrivee=$row[4];
						$heure_depart=$row[6];
						$heure_arrivee=$row[7];
						$date_emission=$row[0];
						$prix=$row[5];
						$res->free();
					} 
					else {
						if ($mysqli->errno) {
							echo "Echec de STORE : (" . $mysqli->errno . ") " . $mysqli->error;
						}
					}	
?>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="assets/images/centraleair.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.php">Accueil</a></li>
					<li><a href="about.html">Informations</a></li>
					<li><a href="rechercher.php">Acheter un Billet</a></li>
					<li class="contact.html"><a href="contact.html">Contact</a></li>
					<li><a class="btn" href="signin.php">Se connecter / S'inscrire</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Accueil</a></li>
			<li class="active">Billet</li>
		</ol>

		<div class="row">
			
			<main class="page payment-page">
				<section class="payment-form dark">
				  <div class="container">
					<div class="block-heading">
					  <h2>Votre Billet</h2>
					</div>
					<form>
					  <div class="products">
						<h3 class="title">Détails Billet</h3>
						<div class="item">
						  <p class="item-name">Départ :  <?php echo "$aeroport_aller"; ?> ( <?php echo "$ville_depart"; ?> ) à <?php echo "$heure_depart"; ?></p>
						  <p class="item-name">Arrivée :  <?php echo "$aeroport_arrivee"; ?> ( <?php echo "$ville_arrivee"; ?> ) à <?php echo "$heure_arrivee"; ?></p>
						  <p class="item-name">Prix Billet :  <?php echo "$prix"; ?></p>
						   <p class="item-name">Date d'émission : <?php echo "$date_emission"; ?></p>
						</div>
					  </div>
					  <div class="card-details">
						<h3 class="title">Détails du Passager</h3>
						<div class="item">
						  <p class="item-name">Nom :  <?php echo "$nom"; ?></p>
						  <p class="item-name">Prénom :  <?php echo "$prenom"; ?> </p>
						  <p class="item-name">Numéro de passeport du passager :  <?php echo "$passeport"; ?></p>
						</div>
					  </div>
					</form>
					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<div class="panel panel-default">
							<div class="panel-body">
								<button class="form-control btn btn-success" type="submit"> <a class="signuplien" href="index.php">Retour à l'accueil</a></button>
							</div>
						</div>
						
					</div>
				  </div>
				</section>
			  </main>
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
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script>
	function paiement() {
	  
	}
	</script>
	

</body>
</html>