<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Administrateur</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

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
					<li><a href="contact.html">Contact</a></li>
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
			<li class="active">Administrateur</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<br></br>
			<table>
			 <caption style="color:red;">Tableau de pilotes </caption>
			 <button  type='submit' name='submit'><a href='addPilote.php'>Nouveau Pilote</a></button>
			  <tr>
					<th>Numéro sécurité sociale</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Salaire</th>
					<th>Heures de vol</th>
					<th>Numéro License</th>
					<th>Adresse</th>
			</tr>
			<?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from pilote;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$nom_pilote=$row[4];
						$prenom_pilote=$row[3];
						$salaire_pilote=$row[6];
						$heure_vol=$row[2];
						$numero_license=$row[1];
						$numero_ss=$row[0];
						$adresse=$row[5];
						echo " <tr>
							<td>$numero_ss</td>
							<td>$nom_pilote</td>
							<td>$prenom_pilote</td>
							<td>$salaire_pilote</td>
							<td>$heure_vol</td>
							<td>$numero_license</td>
							<td>$adresse</td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
				?>	 
			</table>
			
			<br></br>
			<br></br>
			<table>
			 <caption style="color:red;">Tableau des aéroports </caption>
			 <button  type='submit' name='submit'><a href='addAeroport.php'>Nouveau Aéroport</a></button>
			  <tr>
					<th>Nom aéroport</th>
					<th>Code</th>
					<th>Ville</th>
			</tr>
			<?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from aeroport;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$nom_aeroport=$row[0];
						$code=$row[1];
						$ville=$row[2];
						echo " <tr>
							<td>$nom_aeroport</td>
							<td>$code</td>
							<td>$ville</td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
				?>		 
			</table>
			
			<br></br>
			<br></br>
			<table>
			 <caption style="color:red;">Tableau des Membres d'équipage </caption>
			 <button  type='submit' name='submitEquipage'><a href='addEquipage.php'>Nouveau Membre d'équipage</a></button>
			  <tr>
					<th>Numéro sécurité sociale</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Salaire</th>
					<th>Heures de vol</th>
					<th>Fonction</th>
					<th>Adresse</th>
			</tr>
			<?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from membre_equipage;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$nom_membre=$row[4];
						$prenom_membre=$row[3];
						$salaire_membre=$row[6];
						$heure_vol_membre=$row[2];
						$fonction=$row[1];
						$numero_ss_membre=$row[0];
						$adresse_membre=$row[5];
						echo " <tr>
							<td>$numero_ss_membre</td>
							<td>$nom_membre</td>
							<td>$prenom_membre</td>
							<td>$salaire_membre</td>
							<td>$heure_vol_membre</td>
							<td>$fonction</td>
							<td>$adresse_membre</td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
				?>	 
			</table>
			
			
			<br></br>
			<br></br>
			<table>
			 <caption style="color:red;">Tableau des vols </caption>
			 <button  type='submit' name='submitVol'><a href='addVol.php'>Nouveau vol</a></button>
			  <tr>
					<th>Numéro vol</th>
					<th>Début de période</th>
					<th>Fin de période</th>
					<th>Heure départ</th>
					<th>Heure arrivée</th>
					<th>Numéro immatriculation d'avion</th>
			</tr>
			<?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from vol;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$numero_vol=$row[0];
						$debutP=$row[1];
						$finP=$row[2];
						$heureD=$row[3];
						$heureA=$row[4];
						$numero_imm=$row[5];
						echo " <tr>
							<td>$numero_vol</td>
							<td>$debutP</td>
							<td>$finP</td>
							<td>$heureD</td>
							<td>$heureA</td>
							<td>$numero_imm</td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
				?>	 
			</table>
			
			<br></br>
			<br></br>
			<table>
			 <caption style="color:red;">Tableau des liaisons </caption>
			  <tr>
					<th>Numéro vol</th>
					<th>Nom aéroport départ</th>
					<th>Code aéroport départ</th>
					<th>Nom aéroport arrivée</th>
					<th>Code aéroport arrivée</th>
			</tr>
			<?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from vol_aeroport;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$numero_vol_liaison=$row[0];
						$aeropD=$row[1];
						$codeD=$row[2];
						$aeropA=$row[3];
						$codeA=$row[4];
						echo " <tr>
							<td>$numero_vol_liaison</td>
							<td>$aeropD</td>
							<td>$codeD</td>
							<td>$aeropA</td>
							<td>$codeA</td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
				?>	 
			</table>
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
</body>
</html>