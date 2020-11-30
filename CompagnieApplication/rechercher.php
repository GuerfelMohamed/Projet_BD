<?php
	if (isset($_POST['submit'])){		
		if (isset($_POST['villesDepart']) and isset($_POST['villesArrivee']) and isset($_POST['datealler'])){
			header('location: http://localhost:8001/vol.php?villesDepart='.$_POST['villesDepart'].'&villesArrivee='.$_POST['villesArrivee'].'&datealler='.$_POST['datealler']);
			ob_end_flush();
		}
		else $erreur=true;
		if($erreur){
			debug_to_console('erreur');
		}
		}
?>
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

<body>

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
				<!-- Banner -->
				<section id="banner">
				<div class="inner">
					<h1>Industrious</h1>
					<p>A responsive business oriented template with a video background<br />
					designed by <a href="https://templated.co/">TEMPLATED</a> and released under the Creative Commons License.</p>
				</div>
				<video autoplay loop muted playsinline src="images/banner.mp4"></video>
			</section>

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		

		<div class="row">
			
			<!-- main content -->
		<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="rechercher.php" method="post">
				<span class="contact100-form-title">
					Rechercher votre Vol
				</span>
				<div class="col-12" data-validate = "Entrer le lieu de départ !">
					<div class="select">
					<select name="villesDepart">
					<?php 
							$mysqli = new mysqli("db", "root", "root", "bd");
										if ($mysqli->connect_errno) {
										echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
							}
							$result=$mysqli->query("select distinct ville from aeroport;");
							echo  "<option>Départ de</option>";
							while($row = mysqli_fetch_row($result))
							{
							echo  "<option value =".$row[0].">$row[0]</option>";
							}
					?>
					</select>
					 </div>
				</div>

				<div class="col-12" data-validate = "Entrer le lieu d'arrivée !">
					<div class="select">
						<select name="villesArrivee">
						  <?php 
							$mysqli = new mysqli("db", "root", "root", "bd");
										if ($mysqli->connect_errno) {
										echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
							}
							$result=$mysqli->query("select distinct ville from aeroport;");
							echo  "<option>Arrivée à</option>";
							while($row = mysqli_fetch_row($result))
							{
							echo  "<option value =".$row[0].">$row[0]</option>";
							}
					?>
						</select>
					  </div>
				</div>			
				
				<div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Entrer la date de départ">
					<label for="datealler">Date Aller</label>
					<input type="date" name="datealler" id="datealler">
				</div>

				<div class="col-12">
					<button class="button primary">
						<span>
							 <input class="primary" type="submit" value="RECHERCHER UN VOL" name="submit"></input>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
			<!-- /end content -->

		</div>
	</div>	<!-- /container -->





	
<!-- Testimonials -->
<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Faucibus consequat lorem</h2>
						<p>In arcu accumsan arcu adipiscing accumsan orci ac. Felis id enim aliquet. Accumsan ac integer lobortis commodo ornare aliquet accumsan erat tempus amet porttitor.</p>
					</header>
					<div class="testimonials">
						<section>
							<div class="content">
								<blockquote>
									<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic01.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Jane Doe</strong> <span>CEO - ABC Inc.</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic03.jpg" alt="" />
									</div>
									<p class="credit">- <strong>John Doe</strong> <span>CEO - ABC Inc.</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic02.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Janet Smith</strong> <span>CEO - ABC Inc.</span></p>
								</div>
							</div>
						</section>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<h3>Accumsan montes viverra</h3>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
						</section>
						<section>
							<h4>Sem turpis amet semper</h4>
							<ul class="alt">
								<li><a href="#">Dolor pulvinar sed etiam.</a></li>
								<li><a href="#">Etiam vel lorem sed amet.</a></li>
								<li><a href="#">Felis enim feugiat viverra.</a></li>
								<li><a href="#">Dolor pulvinar magna etiam.</a></li>
							</ul>
						</section>
						<section>
							<h4>Magna sed ipsum</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								<li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
							</ul>
						</section>
					</div>
					<div class="copyright">
						&copy; Untitled. Photos <a href="https://unsplash.co">Unsplash</a>, Video <a href="https://coverr.co">Coverr</a>.
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