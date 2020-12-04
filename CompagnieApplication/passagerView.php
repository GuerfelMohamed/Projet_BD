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
        <h1>Espace passager</h1>
    </div>


    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <?php
				$idUser = $_GET['idPassager'];	
				$mysqli = new mysqli("db", "root", "root", "bd");
				if ($mysqli->connect_errno) 
				{
				echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
				}
				echo  "<div style='text-align: center;'>
						<button type='submit' name='submit' class='btn btn-primary btn-block'>
							<a href='rechercher.php?acces=$idUser'>Acheter un Billet</a>
						</button>
						</div>";
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
                    echo '<div class="highlights">';
					do {
						if ($result2 = $mysqli->store_result()) {
							$arrayResult= $result2->fetch_all();
							foreach($arrayResult as $billetRow){
													
								echo "<section><div class='content'><header>";
                                echo "<a href='#' class='icon fa fa-plane'><span class='label'>Icon</span></a>";
                                echo "<h3>Billet num: $i</h3>";
                                $i=$i+1;	 
                                echo "</header>";
                                echo "<p>Billet émis à la date : $billetRow[1]</p>";
                                echo "<p>Numéro passeport du passager : $billetRow[3]</p>";
                                
								if (!$res=$mysqli->multi_query("CALL info_billet($billetRow[2])")) {
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
								echo "<p>Départ : '$heure_depart' de l'aéroport '$aeroport_aller' ( '$ville_depart' ).</p>";
								echo "<p>Arrivée : '$heure_arrivee' à l'aéroport '$aeroport_arrivee' ( '$ville_arrivee' ).</p>";
                                echo "</div></section>";
                            }
						}
                        }while ($mysqli->more_results() && $mysqli->next_result());
                        echo "</div>";
						}}
				?>
                <!-- /Article -->
            </div>
        </div> <!-- /container -->
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