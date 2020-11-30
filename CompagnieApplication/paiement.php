<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Paiement</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/payment.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
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
$mysqli = new mysqli("db", "root", "root", "gestion_aeroport");
if ($mysqli->connect_errno) {
					echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$id_Depart = $_GET['idDepart'];
$depart = $_GET['depart'];
$arrivee = $_GET['arrivee'];
$result=$mysqli->query("select prix FROM depart WHERE id_depart='$id_Depart';");
$res=$result->fetch_assoc();
$prix=$res['prix'];
?>
<?php
session_start();
$verif=$_SESSION['idUser'];
debug_to_console($verif);
if (isset($_POST['submit'])and $verif!=NULL){
	if (isset($_POST['nomPassager']) and isset($_POST['prenomPassager'])and isset($_POST['numeroPassager'])and isset($_POST['adressePassager'])){	
	$mysqli = new mysqli("db", "root", "root", "bd");
			$nom=$_POST['nomPassager'];
			$prenom=$_POST['prenomPassager'];
			$passeport=$_POST['numeroPassager'];
			$adresse=$_POST['adressePassager'];
			$verif=$_SESSION['idUser'];
			debug_to_console($verif);
				if (!$resInsert=$mysqli->multi_query("CALL nouveau_passager('$passeport','$prenom','$nom','$adresse',$verif,$id_Depart)")) {
					echo "Echec lors de l'appel à la procédure stockée : (" . $mysqli->errno . ") " . $mysqli->error;
}
header("location: http://localhost/CompagnieApplication/billet.php?idDepart=$id_Depart&nom=$nom&prenom=$prenom&passeport=$passeport&adresse=$adresse");
}}
else{
	if (isset($_POST['nomPassager']) and isset($_POST['prenomPassager'])and isset($_POST['numeroPassager'])and isset($_POST['adressePassager'])){	
	$mysqli = new mysqli("db", "root", "root", "gestion_aeroport");
			$nom=$_POST['nomPassager'];
			$prenom=$_POST['prenomPassager'];
			$passeport=$_POST['numeroPassager'];
			$adresse=$_POST['adressePassager'];
				if (!$resInsert=$mysqli->multi_query("CALL nouveau_passager('$passeport','$prenom','$nom','$adresse',NULL,$id_Depart)")) {
					echo "Echec lors de l'appel à la procédure stockée : (" . $mysqli->errno . ") " . $mysqli->error;
}
header("location: http://db/CompagnieApplication/billet.php?idDepart=$id_Depart&nom=$nom&prenom=$prenom&passeport=$passeport&adresse=$adresse");
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
			<li class="active">Paiement</li>
		</ol>

		<div class="row">
			
			<main class="page payment-page">
				<section class="payment-form dark">
				  <div class="container">
					<div class="block-heading">
					  <h2>Paiement</h2>
					</div>
					<form  method="post">
					  <div class="products">
						<h3 class="title">Check-out</h3>
						<div class="item">
						  <span class="price"><?php echo "$prix"; ?></span>
						  <p class="item-name">Billet 1</p>
						  <p class="item-description">De <?php echo "$depart"; ?> à <?php echo "$arrivee"; ?></p>
						</div>
						<div class="total">Total<span class="price"><?php echo "$prix"; ?></span></div>
					  </div>
					  <div class="card-details">
						<h3 class="title">Détails du Passager</h3>
						<div class="row">
						  <div class="form-group col-sm-5">
							<label for="card-holder">Nom passager</label>
							<input id="nom-passager" type="text" name ="nomPassager" class="form-control" placeholder="Nom passager" aria-label="Card Holder" aria-describedby="basic-addon1">
						  </div>
						  <div class="form-group col-sm-5">
							<label for="card-holder">Prénom Passager</label>
							<input id="prenom-passager" type="text" name ="prenomPassager" class="form-control" placeholder="Prénom passager" aria-label="Card Holder" aria-describedby="basic-addon1">
						  </div>
						  <div class="form-group col-sm-5">
							<label for="card-number">Numéro Passeport</label>
							<input id="numero-passeport" type="text" name ="numeroPassager" class="form-control" placeholder="Numéro Passeport" aria-label="Card Holder" aria-describedby="basic-addon1">
						  </div>
						  <div class="form-group col-sm-5">
							<label for="card-number">Adresse</label>
							<input id="adresse-passager" type="text" name ="adressePassager" class="form-control" placeholder="Adresse" aria-label="Card Holder" aria-describedby="basic-addon1">
						  </div>
						</div>
					  </div>
					  <div class="card-details">
						<h3 class="title">Détails de la carte de crédit</h3>
						<div class="row">
						  <div class="form-group col-sm-7">
							<label for="card-holder">Titulaire de la carte</label>
							<input id="card-holder" type="text" class="form-control" placeholder="Titulaire de la carte" aria-label="Card Holder" aria-describedby="basic-addon1">
						  </div>
						  <div class="form-group col-sm-5">
							<label for="">Date d'expiration</label>
							<div class="input-group expiration-date">
							  <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
							  <span class="date-separator">/</span>
							  <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
							</div>
						  </div>
						  <div class="form-group col-sm-8">
							<label for="card-number">Numéro de carte</label>
							<input id="card-number" type="text" class="form-control" placeholder="Numéro de carte" aria-label="Card Holder" aria-describedby="basic-addon1">
						  </div>
						  <div class="form-group col-sm-4">
							<label for="cvc">CVC</label>
							<input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
						  </div>
						  <div class="form-group col-sm-12">
							<button type="submit" name='submit' class="btn btn-primary btn-block" >
							Procéder
							</button>
						  </div>
						</div>
					  </div>
					</form>
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