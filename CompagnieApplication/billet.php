<?php
			$id_Depart = $_GET['idDepart'];
			$nom=$_GET['nom'];
			$prenom=$_GET['prenom'];
			$passeport=$_GET['passeport'];
			$adresse=$_GET['adresse'];
			$mysqli = new mysqli("db", "root", "root", "bd");
			if (!$res=$mysqli->multi_query("CALL info_billet($id_Depart)")) {
				echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
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
							echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
						}
					}	
?>
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
            <li><a href="index.php">Accueil</a></li>
            <li><a href="about.html">Informations</a></li>
            <li><a href="rechercher.php">Acheter un Billet</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>

    </nav>

    <!-- Heading -->
    <div id="heading">
        <h1>Votre Billet</h1>
    </div>

    <!-- container -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <div style="text-align: center;">
                    <h3 style="color:red; text-align: center;">Détails Billet</h3>
                    <div>
                        <p>Départ : <?php echo "$aeroport_aller"; ?> (
                            <?php echo "$ville_depart"; ?> ) à <?php echo "$heure_depart"; ?></p>
                        <p>Arrivée : <?php echo "$aeroport_arrivee"; ?> (
                            <?php echo "$ville_arrivee"; ?> ) à <?php echo "$heure_arrivee"; ?></p>
                        <p>Prix Billet : <?php echo "$prix"; ?></p>
                        <p>Date d'émission : <?php echo "$date_emission"; ?></p>
                    </div>

                    <br></br>

                    <h3 style="color:red; text-align: center;">Détails du Passager</h3>
                    <div>
                        <p>Nom : <?php echo "$nom"; ?></p>
                        <p>Prénom : <?php echo "$prenom"; ?> </p>
                        <p>Numéro de passeport du passager :
                            <?php echo "$passeport"; ?>
                        </p>
                    </div>
                </div>

                <div class="col-12">
                    <div style="text-align: center;">
                        <button type="submit"> <a href="index.php">Retour à l'accueil</a></button>
                    </div>
                </div>

            </div>
        </div> <!-- /container -->
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <div class="content">
                <section>
                    <h3>Service Relation Clientèle</h3>
                    <p>Nous sommes à votre écoute 24h/24, 7j/7 sur Messenger, Facebook et Twitter pour faciliter
                        votre voyage. Nous vous aidons où que vous soyez</p>
                </section>
                <section>
                    <ul class="alt">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="about.html"></a>Informations</li>
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