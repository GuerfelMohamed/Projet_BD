<?php
if (isset($_POST['submit'])){
	if (isset($_POST['nom']) and isset($_POST['prenom'])and isset($_POST['email'])and isset($_POST['passWord'])and isset($_POST['passWordConf']))
	{	
		$mysqli = new mysqli("db", "root", "root", "bd");
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$password=$_POST['passWord'];
		if (!$resInsert=$mysqli->multi_query("CALL nouvel_utilisateur('$nom','$prenom','$email','$password',10)")) {
			echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
		}
		else{
			header("location: http://localhost:8001/confirmationcompte.php?mail=$email&nom=$nom");
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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="rechercher.php">Réservation de billet</a></li>
            <li><a href="signin.php">Connexion</a></li>
            <li><a href="contact.html">Contacter nous</a></li>
        </ul>
    </nav>


    <div id="heading">
        <h1>S'inscrire</h1>
    </div>

    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">



                <h3 style="color:red; text-align: center;">Enregistrer un nouveau compte</h3>

                <form method="post">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Nom</label>
                            <input type="text" name="nom" value="" placeholder="nom">
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Prénom</label>
                            <input type="text" name="prenom" placeholder="prenom">
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">Email<span style="color:red;">*</span></label>
                            <input type="email" name="email" placeholder="prenom">
                        </div>

                        <div class="col-12">
                            <label style="text-align: left;">Mot de passe <span style="color:red;">*</span></label>
                            <input type="password" name="passWord">
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">Confirmer votre mot de passe<span
                                    style="color:red;">*</span></label>
                            <input type="password" name="passWordConf">
                        </div>


                        <div class="row">
                            <div class="col-6 col-12-xsmall">
                                <input type="radio" name="checkbox" checked />
                                <label>J'ai lu <a href="page_terms.html"> les termes et conditions</a> </label>
                            </div>

                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" name="submit" value="S'inscrit" class="primary" /></li>
                                    <li><input type="reset" value="Reset" /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
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