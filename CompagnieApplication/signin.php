<?php 
    session_start();
    $_SESSION["idUser"] = NULL;
	$erreur=False;
	$message="";
	if (isset($_POST['submit'])){
		if (isset($_POST['email']) and isset($_POST['passWord'])){
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$domain= explode("@",$_POST['email'])[1];
				if (!checkdnsrr($domain,"MX")){
						$message="Email invalide";
					$erreur=True;
				}
				else{
					$email=$_POST['email'];
					$mysqli = new mysqli("db", "root", "root", "bd");
					if ($mysqli->connect_errno) {
						echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
					}
					$mail=$mysqli->real_escape_string($email);
					
					$result=$mysqli->query("select mot_de_passe, idUtilisateur FROM utilisateur WHERE email='$mail';");	
										
					if ($result->num_rows <=0){
						$erreur=True;
					}
					else {
						$row=$result->fetch_assoc();
						if($_POST['passWord'] == $row['mot_de_passe']){	
							
							$idUser=$row['idUtilisateur'];
							$auto=$mysqli->query("select * FROM utilisateur_roles WHERE Id_utilisateur=$idUser;");
							while($rowAuto=mysqli_fetch_row($auto)){
							//debug_to_console($rowAuto[1]);
							if($rowAuto[1]!=0){
                            header("location: http://localhost:8001/passagerView.php?idPassager=$idUser");
                            $_SESSION["idUser"] = $idUser;
														}
						if($rowAuto[1]==0){
							header("location: http://localhost:8001/adminView.php");
											}
						}}
						else {$erreur=True;
						$message="Mot de passe incorrect";
						}
					}
				}
			}
			else { 
				$erreur=True;
				$message="Email invalide";
			}
		}
		else $erreur=true;
		if($erreur){
			echo "<center><p><b>ERROR:' . $message' </b></p></center>";
		}
    }
    echo $_SESSION["idUser"];
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
            <li><a href="signup.php">S'inscrire</a></li>
            <li><a href="contact.html">Contacter nous</a></li>
        </ul>
    </nav>

    <div id="heading">
        <h1>Se connecter</h1>
    </div>


    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">

                <h3 style="color:red; text-align: center;">Connectez-vous à votre compte</h3>

                <form action="signin.php" method="post">
                    <div class="row gtr-uniform">

                        <div class="col-12">
                            <label style="text-align: left;">Adresse mail Utilisateur <span
                                    style="color:red;">*</span></label>
                            <input type="email" required="required" name="email" value="" placeholder="email">
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">Mot de passe <span style="color:red;">*</span></label>
                            <input type="password" required="required" name="passWord" value="">
                        </div>

                        <div>
                            <ul class="actions">
                                <li><input type="submit" name="submit" value="Se connecter" class="primary" /></li>
                                <li><input type="reset" value="Reset" /></li>
                            </ul>
                        </div>
                    </div>

                </form>
                <div class="col-12">
                    <h3 style="color:red; text-align: center;">Vous n'êtes pas inscrit ?</h3>
                    <ul style="text-align: center;">
                        <button type="submit"> <a class="signuplien" href="signup.php">S'inscrire</a></button>
                    </ul>
                </div>
            </div>

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