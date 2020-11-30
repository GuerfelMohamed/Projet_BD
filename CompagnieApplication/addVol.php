<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Ajout d'un vol</title>

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
	if (isset($_POST['num']) and isset($_POST['db']) and isset($_POST['fn'])and isset($_POST['hd'])and isset($_POST['ha'])and isset($_POST['numa'])){
	$num=$_POST['num'];
	$db=$_POST['db'];
	$fn=$_POST['fn'];
	$hd=$_POST['hd'];
	$ha=$_POST['ha'];
	$numa=$_POST['numa'];
$mysqli = new mysqli("db", "root", "root", "bd");
if (!$res=$mysqli->multi_query("CALL ajouter_vol($num,'$db','$fn','$hd','$ha','$numa')")) {
														echo "Echec lors de l'appel à la procédure stockée : (" . $mysqli->errno . ") " . $mysqli->error;
													}
	}
	header('location: http://localhost/CompagnieApplication/adminView.php');
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
					<li><a href="contact.html">Contact</a></li>
					<li class="active"><a class="btn" href="signin.php">Se connecter / S'inscrire</a></li>
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
			<li class="active">Vol</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Ajout d'un vol</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Ajouter un nouveau vol</h3>
							<hr>

							<form  method="post">
								<div class="top-margin">
									<label>Numéro vol</label>
									<input type="text" name="num" class="form-control">
								</div>
								<div class="top-margin">
									<label>Début période</label>
									<input type="date" name="db" class="form-control">
								</div>
								<div class="top-margin">
									<label>Fin période<span class="text-danger">*</span></label>
									<input type="date" name="fn" class="form-control">
								</div>
								
								<div class="top-margin">
									<label>Heure départ<span class="text-danger">*</span></label>
									<input type="time" name="hd" class="form-control">
								</div>
								
								<div class="top-margin">
									<label>Heure arrivée<span class="text-danger">*</span></label>
									<input type="time" name="ha" class="form-control">
								</div>
								
								<div class="top-margin">
									<label>Numéro immatriculation de l'avion<span class="text-danger">*</span></label>
								<div class="select">
									<select name="numa">
									<?php 
											$mysqli = new mysqli("db", "root", "root", "bd");
														if ($mysqli->connect_errno) {
														echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
											}
											$result=$mysqli->query("select distinct numero_immatriculation from avion;");
											echo  "<option>Numéro immatriculation avion</option>";
											while($row = mysqli_fetch_row($result))
											{
											echo  "<option value =".$row[0].">$row[0]</option>";
											}
									?>
									</select>
								 </div>
								
								
		
								<hr>

								<div class="row">
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" name="submit" type="submit">Enregistrer</button>
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
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>