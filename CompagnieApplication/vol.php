<!DOCTYPE html>
<html lang="en">

<head>
    <title>Avianav</title>
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
            <li><a href="contact.html">Contacter nous</a></li>
        </ul>
    </nav>

    <div id="heading">
        <h1>Choisir votre vol</h1>
    </div>

    <section id="main" class="wrapper">
        <div class="inner">
            <!-- main content -->
            <?php
				$depart = $_GET['villesDepart'];
				$arrivee = $_GET['villesArrivee'];
				$datealler = $_GET['datealler'];
				$mysqli = new mysqli("db", "root", "root", "bd");
				 
				if (!$res=$mysqli->multi_query("CALL mon_vol('$depart','$arrivee','$datealler')")) {
					echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
								}
				 
				echo "<h1 style='color:red; text-align: center;'>$depart - $arrivee</h1>"; 
				echo '<div class="highlights">';
				do {
					if ($res = $mysqli->store_result()) {
						$arrayResult= $res->fetch_all();
						foreach($arrayResult as $result)
						{
							echo "<section><div class='content'><header>";
							echo'<a href="#" class="icon fa fa-plane"><span class="label">Icon</span></a>';
							echo "<h3>Vol du $result[2]</h3>";
							echo "</header>";
							echo "<p>Aéroport départ : $result[0]</p>";
							echo "<p>Aéroport Destination : $result[1]</p>";
							echo "<p>Heure Départ : $result[3]</p>";
							echo "<p>Heure Arrivée : $result[4]</p>";
							echo "<form method='post'><button class='selectvol' type='submit' name='submit'><a href='paiement.php?idDepart=$result[5]&depart=$depart&arrivee=$arrivee'>Sélectionner ce vol</a></button></form>";
							echo "</div></section>";
						}
						
						$res->free();
					} else {
						if ($mysqli->errno) {
							echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
						}
					}
				} while ($mysqli->more_results() && $mysqli->next_result());
				echo "</div>";

			?>
            <!-- /end content -->
        </div>
    </section>

    <footer id="footer">
        <div class="inner">
            <div class="content">
                <section>
                    <h3>Service Relation Clientèle</h3>
                    <p>Nous sommes à votre écoute 24h/24, 7j/7 sur Messenger, Facebook et Twitter pour faciliter
                        votre
                        voyage. Nous vous aidons où que vous soyez</p>
                </section>
                <section>
                    <ul class="alt">
                        <li><a href="index.php">Accueil</a></li>
                        <li>
                            <a href="about.html"></a>Informations
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </section>
                <section>
                    <h4>Visitez nos réseaux sociaux</h4>
                    <ul class="plain">
                        <li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
                        <li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
                        <li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
                        <li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
                    </ul>
                </section>
            </div>
            <div class="copyright">
                &copy; 2020, CentraleAir. Designed by<a href="https://unsplash.co">Groupe Centrale</a>
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