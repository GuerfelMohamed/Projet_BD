<?php
    $idUser = $_GET['acces'];
	if (isset($_POST['submit'])){		
		if (isset($_POST['villesDepart']) and isset($_POST['villesArrivee']) and isset($_POST['datealler'])){
			header('location: http://localhost:8001/vol.php?villesDepart='.$_POST['villesDepart'].'&villesArrivee='.$_POST['villesArrivee'].'&datealler='.$_POST['datealler'].'&idUser='.$idUser);
			ob_end_flush();
		}
		else $erreur=true;
		if($erreur){
			echo "<center><p><b>Invalid request !</b></p></center>";
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
            <li><a href="contact.html">Contacter nous</a></li>
        </ul>
    </nav>

    <div id="heading">
        <h1>Réservation de billet</h1>
    </div>

    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">

                <h3 style="color:red; text-align: center;">
                    Rechercher votre Vol
                </h3>

                <form method="post">
                    <div class="row gtr-uniform">

                        <div class="col-12" data-validate="Entrer le lieu de départ !">
                            <label style="text-align: left;">ville de départ</label>
                            <div class="select">
                                <select name="villesDepart">
                                    <?php 
									$mysqli = new mysqli("db", "root", "root", "bd");
									if ($mysqli->connect_errno) {
										echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
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

                        <div class="col-12" data-validate="Entrer le lieu d'arrivée !">
                            <label style="text-align: left;">ville d'arrivée</label>
                            <div class="select">
                                <select name="villesArrivee">
                                    <?php 
									$mysqli = new mysqli("db", "root", "root", "bd");
									if ($mysqli->connect_errno) {
										echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
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

                        <div class="col-12" data-validate="Entrer la date de départ">
                            <label style="text-align: CENTER;">Date Aller</label>
                            <input type="date" name="datealler" id="datealler" required="required">
                        </div>

                        <div>
                            <ul class="actions">
                                <li><input type="submit" name="submit" value="RECHERCHER UN VOL" class="primary" /></li>
                                <li><input type="reset" value="Reset" /></li>
                            </ul>
                        </div>
                    </div>
                </form>

            </div>
        </div> <!-- /container -->
    </section>






    <!-- Testimonials -->
    <section class="wrapper">
        <div class="inner">
            <header class="special">
                <h2>Faucibus consequat lorem</h2>
                <p>In arcu accumsan arcu adipiscing accumsan orci ac. Felis id enim aliquet. Accumsan ac integer
                    lobortis commodo ornare aliquet accumsan erat tempus amet porttitor.</p>
            </header>
            <div class="testimonials">
                <section>
                    <div class="content">
                        <blockquote>
                            <p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor
                                sem
                                non mi integer non faucibus.</p>
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
                            <p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor
                                sem
                                non mi integer non faucibus.</p>
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
                            <p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor
                                sem
                                non mi integer non faucibus.</p>
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