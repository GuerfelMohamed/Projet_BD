<?php
    if (isset($_POST['submit'])){
        if (isset($_POST['num_vol']) and isset($_POST['db']) and isset($_POST['pl'])and isset($_POST['prix'])){
        $num_vol=intval($_POST['num_vol']);
        $db=$_POST['db'];
        $pl=$_POST['pl'];
        $prix=$_POST['prix'];
    $mysqli = new mysqli("db", "root", "root", "bd");
    if (!$res=$mysqli->multi_query("insert into depart (place_libre, place_occupee, date_depart, numero_vol, prix) 
                                    values ('$pl',0,'$db','$num_vol','$prix')")) 
    {  
        echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
    }
    else{
        header('location: http://localhost:8001/adminView.php');
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

    <!-- container -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <h3 style="color:red; text-align: center;">Ajouter un départ</h3>
                <form method="post">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Numéro vol</label>
                            <div class="select">
                                <select name="num_vol">
                                    <?php 
											$mysqli = new mysqli("db", "root", "root", "bd");
														if ($mysqli->connect_errno) {
                                                            echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";											}
											$result=$mysqli->query("select distinct numero_vol from vol;");
											echo  "<option>Numéro vol</option>";
											while($row = mysqli_fetch_row($result))
											{
											echo  "<option value ='$row[0]'>$row[0]</option>";
											}
									?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Date de départ</label>
                            <input type="date" required="required" name="db" value="" placeholder="date de départ">
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Nombre de places</label>
                            <input type="text" required="required" name="pl" value="" placeholder="nombre de places">
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Prix</label>
                            <input type="text" required="required" name="prix" value="" placeholder="prix de billet">

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