<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Passager</title>

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
			<li class="active">Vos Voyages</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<?php
			$idUser = $_GET['idPassager'];	
			$mysqli = new mysqli("db", "root", "root", "bd");
								if ($mysqli->connect_errno) {
								echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
								}
								echo  "<button type='submit' name='submit' class='btn btn-primary btn-block'><a href='rechercher.php?acces=1'>Acheter un Billet</a></button>";
								$result=$mysqli->query("select * FROM passager WHERE IdUtilisateur=$idUser;");
								if ($result->num_rows <=0){
									//pas de resultat
								}
								else {
									$i=1;
									while($passagerRow = mysqli_fetch_row($result))
										{
										$passeport=$passagerRow[0];
										$result2=$mysqli->multi_query("select * FROM billet WHERE passeport_passager='$passeport';");
										do {
											
											if ($result2 = $mysqli->store_result()) {
											$arrayResult= $result2->fetch_all();
											foreach($arrayResult as $billetRow){
												
													 echo "<div class='products'>";
													 echo "<h3 class='title'>Billet $i</h3>";
														$i=$i+1;	 
													 echo "<div class='item'>";
													 echo "<br></br>";
													 echo "<p class='item-name'>Billet émis à la date : ".$billetRow[1]."</p>";
													 echo "<p class='item-name'>Numéro passeport du passager : ".$billetRow[3]."</p>";
													 $result3=$mysqli->query("select * FROM depart WHERE id_depart=$billetRow[2];");
													 $result3 = mysqli_fetch_row($result3);
													 $result4=$mysqli->query("select * FROM vol WHERE numero_vol=$result3[4];");
													 $result4 = mysqli_fetch_row($result4);
													if (!$res=$mysqli->multi_query("CALL info_billet($billetRow[2])")) {
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
													 echo "<p class='item-name'>Départ : ".$result3[3]." à ".$result4[3]." de l'aéroport ".$aeroport_aller." ( ".$ville_depart." ).</p>";
													 echo "<p class='item-name'>Arrivée : ".$result3[3]." à ".$result4[4]." à l'aéroport ".$aeroport_arrivee." ( ".$ville_arrivee." ).</p>";
													 echo "</div>";
													 echo "</div>";

											}
										}
										}while ($mysqli->more_results() && $mysqli->next_result());
										}
									}
			?>
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