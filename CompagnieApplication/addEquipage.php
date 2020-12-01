<?php
	if (isset($_POST['submit'])){
		if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['adresse'])and isset($_POST['salaire'])and isset($_POST['heureVol'])and isset($_POST['numSS'])and isset($_POST['fonction'])){
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$adresse=$_POST['adresse'];
		$salaire=intval($_POST['salaire']);
		$heureVol=$_POST['heureVol'];
		$numSS=intval($_POST['numSS']);
		$fonction=$_POST['fonction'];
	$mysqli = new mysqli("db", "root", "root", "bd");
	if (!$res=$mysqli->multi_query("insert into membre_equipage values('$numSS','$fonction','$heureVol','$prenom','$nom','$adresse','$salaire')")) 
	{
        echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
	}
	else{
		header('location: http://localhost/CompagnieApplication/adminView.php');

	}
	}}
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
        <h1>Administration</h1>
    </div>


    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">


                <h3 style="color:red; text-align: center;">Ajouter un nouveau membre d'équipage</h3>
                <form method="post">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Nom</label>
                            <input type="text" name="nom" value="" placeholder="nom" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Prénom</label>
                            <input type="text" name="prenom" value="" placeholder="prénom">
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">Adresse<span style="color:red;">*</span></label>
                            <input type="text" name="adresse" value="" placeholder="adresse">
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Salaire<span style="color:red;">*</span></label>
                            <input type="text" name="salaire" value="" placeholder="salaire">
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Heures de vol<span style="color:red;">*</span></label>
                            <input type="text" name="heureVol" value="" placeholder="Heures de vol">
                        </div>

                        <div class="col-12">
                            <label style="text-align: left;">Numéro Sécurité sociale<span
                                    style="color:red;">*</span></label>
                            <input type="text" name="numSS" value="" placeholder="Numéro sécurité sociale">
                        </div>

                        <div class="col-12">
                            <label style="text-align: left;">Fonction<span style="color:red;">*</span></label>
                            <input type="text" name="fonction" value="" placeholder="fonction">
                        </div>

                        <div>
                            <ul class="actions">
                                <li><input type="submit" name="submit" value="Enregistrer" class="primary" /></li>
                                <li><input type="reset" value="Reset" /></li>
                            </ul>
                        </div>
                    </div>
                </form>


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