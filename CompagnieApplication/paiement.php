<?php
	$mysqli = new mysqli("db", "root", "root", "bd");
	if ($mysqli->connect_errno) {
		echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
	}
	$id_Depart = $_GET['idDepart'];
	$depart = $_GET['depart'];
	$arrivee = $_GET['arrivee'];
	$result=$mysqli->query("select prix FROM depart WHERE id_depart='$id_Depart';");
	$res=$result->fetch_assoc();
    $prix=$res['prix'];
    $verif=$_GET['idUser'];
?>
<?php
	if (isset($_POST['submit'])and $verif!=NULL){
		if (isset($_POST['nomPassager']) and isset($_POST['prenomPassager'])and isset($_POST['numeroPassager'])and isset($_POST['adressePassager'])){	
		$mysqli = new mysqli("db", "root", "root", "bd");
				$nom=$_POST['nomPassager'];
				$prenom=$_POST['prenomPassager'];
				$passeport=$_POST['numeroPassager'];
				$adresse=$_POST['adressePassager'];
				if (!$resInsert=$mysqli->multi_query("CALL nouveau_passager('$passeport','$prenom','$nom','$adresse',$verif,$id_Depart)"))
				{
					echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
				}
				else{
					header("location: http://localhost:8001/billet.php?idDepart=$id_Depart&nom=$nom&prenom=$prenom&passeport=$passeport&adresse=$adresse");
				}
	            }}
	else{
		if (isset($_POST['nomPassager']) and isset($_POST['prenomPassager'])and isset($_POST['numeroPassager'])and isset($_POST['adressePassager']))
		{	
			$mysqli = new mysqli("db", "root", "root", "bd");
			$nom=$_POST['nomPassager'];
			$prenom=$_POST['prenomPassager'];
			$passeport=$_POST['numeroPassager'];
			$adresse=$_POST['adressePassager'];
			if (!$resInsert=$mysqli->multi_query("CALL nouveau_passager('$passeport','$prenom','$nom','$adresse',NULL,$id_Depart)")) 
			{
				echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
			}
			else{
				header("location: http://localhost:8001/billet.php?idDepart=$id_Depart&nom=$nom&prenom=$prenom&passeport=$passeport&adresse=$adresse");
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
            <li><a href="contact.html">Contacter nous</a></li>
        </ul>
    </nav>

    <div id="heading">
        <h1>Paiement</h1>
    </div>
    <!-- container -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <h3 style="color:red; text-align: center;">Check-out</h3>
                <table class="table-wrapper">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Prix</th>
                            <th>Départ de</th>
                            <th>Arrivée à</th>
                            <th>Totale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>Billet 1</td>
                        <td><?php echo "$prix"; ?></td>
                        <td><?php echo "$depart"; ?></td>
                        <td><?php echo "$arrivee"; ?></td>
                        <td><?php echo "$prix"; ?></td>
                    </tbody>
                </table>

            </div>

            <div class="content">

                <h3 style="color:red; text-align: center;">Détails du Passager</h3>
                <form method="post">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Nom passager</label>
                            <input id="nom-passager" type="text" name="nomPassager" placeholder="Nom passager"
                                aria-label="Card Holder" aria-describedby="basic-addon1">
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Prénom Passager</label>
                            <input id="prenom-passager" type="text" name="prenomPassager" placeholder="Prénom passager"
                                aria-label="Card Holder" aria-describedby="basic-addon1">
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Numéro Passeport</label>
                            <input id="numero-passeport" type="text" name="numeroPassager"
                                placeholder="Numéro Passeport" aria-label="Card Holder" aria-describedby="basic-addon1">
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Adresse</label>
                            <input id="adresse-passager" type="text" name="adressePassager" placeholder="Adresse"
                                aria-label="Card Holder" aria-describedby="basic-addon1">
                        </div>


                        <div class="col-12">
                            <h3 style="color:red; text-align: center;">Détails de la carte de crédit</h3>
                        </div>

                        <div class="col-12">
                            <label style="text-align: left;">Numéro de carte</label>
                            <input id="card-number" type="text" placeholder="Numéro de carte">
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">Titulaire de la carte</label>
                            <input id="card-holder" type="text" placeholder="Titulaire de la carte">
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">Date d'expiration</label>
                            <input type="month" placeholder="MM-AA">
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label style="text-align: left;">CVC</label>
                            <input id="cvc" type="text" placeholder="CVC">
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" name="submit" value="Procéder" class="primary" /></li>
                                <li><input type="reset" value="Reset" /></li>
                            </ul>
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


</body>

</html>