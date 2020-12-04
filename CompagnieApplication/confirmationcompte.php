<?php
	$mail = $_GET['mail'];
	$nom=$_GET['nom'];
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

    <!-- container -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">


                <h2 style="color:red; text-align: center;">Bienvenue chez Avianav Monsieur/Madame <?php echo $nom;?>
                </h2>
                <div style="text-align: center;">
                    <h3 class="title">Votre compte associé à l'adresse mail <?php echo $mail; ?> a été
                        créé avec succés.</h3>
                </div>
                <div style="text-align: center;">
                    <button class="form-control btn btn-success" type="submit"> <a href="index.php">Retour à
                            l'accueil</a></button>


                </div>
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