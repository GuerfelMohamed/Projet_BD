<?php
	if (isset($_POST['submit_p'])){
		if (isset($_POST['numero_ss'])){
		$numeroSS=$_POST['numero_ss'];
	    $mysqli = new mysqli("db", "root", "root", "bd");
	    if (!$res=$mysqli->multi_query("delete from pilote where numero_SS='$numeroSS'")) 
	    {
		    echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
	    }
	    else{
		    header('location: http://localhost:8001/adminView.php');
	    }
    }}
    if (isset($_POST['submit_a'])){
		if (isset($_POST['nom_aeroport']) and isset($_POST['code'])){
		$nom_aeroport=$_POST['nom_aeroport'];
		$code=$_POST['code'];
	    $mysqli = new mysqli("db", "root", "root", "bd");
	    if (!$res=$mysqli->multi_query("delete from aeroport where nom_aeroport='$nom_aeroport' and code='$code'")) 
	    {
		    echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
	    }
	    else{
		    header('location: http://localhost:8001/adminView.php');
	    }
    }}
    if (isset($_POST['submit_e'])){
		if (isset($_POST['numero_ss_membre'])){
		$numero_ss_membre=$_POST['numero_ss_membre'];
	    $mysqli = new mysqli("db", "root", "root", "bd");
	    if (!$res=$mysqli->multi_query("delete from membre_equipage where numero_SS='$numero_ss_membre'")) 
	    {
		    echo "<center><p><b>ERROR:' . $mysqli->error' </b></p></center>";
	    }
	    else{
		    header('location: http://localhost:8001/adminView.php');
	    }
    }}
    if (isset($_POST['submit_l'])){
		if (isset($_POST['numero_vol_liaison'])){
		$numero_vol_liaison=$_POST['numero_vol_liaison'];
	    $mysqli = new mysqli("db", "root", "root", "bd");
	    if (!$res=$mysqli->multi_query("delete from vol_aeroport where numero_vol='$numero_vol_liaison'")) 
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

    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <!-- Article main content -->
                <br></br>
                <ul class="actions">
                    <li><a href="addPilote.php" class="button primary icon fa-plus">Ajouter Pilote</a></li>
                </ul>
                <table class="table-wrapper">
                    <h3 style="color:red; text-align: center;">Tableau de pilotes </h3>
                    <thead>
                        <tr>
                            <th>Numéro sécurité sociale</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Salaire</th>
                            <th>Heures de vol</th>
                            <th>Numéro License</th>
                            <th>Adresse</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from pilote;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$nom_pilote=$row[4];
						$prenom_pilote=$row[3];
						$salaire_pilote=$row[6];
						$heure_vol=$row[2];
						$numero_license=$row[1];
						$numero_ss=$row[0];
						$adresse=$row[5];
                        echo "
                        <tr>
							<td>$numero_ss</td>
							<td>$nom_pilote</td>
							<td>$prenom_pilote</td>
							<td>$salaire_pilote</td>
							<td>$heure_vol</td>
							<td>$numero_license</td>
                            <td>$adresse</td>
                            <td>
                            <form method='post'>
                                <input type='hidden' name='numero_ss' value='$numero_ss'>
                                <ul class='actions'>
                                    <li><input type='submit' name='submit_p' value='Delete' class='primary'/></li>
                                </ul>
                            </form>
                            </td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
                    ?>
                    </tbody>
                </table>

                <br></br>
                <br></br>
                <ul class="actions">
                    <li><a href="addAeroport.php" class="button primary icon fa-plus">Ajouter Aéroport</a></li>
                </ul>
                <table class="table-wrapper">
                    <h3 style="color:red; text-align: center;">Tableau d'aéroports </h3>
                    <thead></thead>
                    <tr>
                        <th>Nom aéroport</th>
                        <th>Code</th>
                        <th>Ville</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from aeroport;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$nom_aeroport=$row[0];
						$code=$row[1];
						$ville=$row[2];
						echo " <tr>
							<td>$nom_aeroport</td>
							<td>$code</td>
                            <td>$ville</td>
                            <td>
                            <form method='post'>
                            <input type='hidden' name='nom_aeroport' value='$nom_aeroport'>
                            <input type='hidden' name='code' value='$code'>
                                <ul class='actions'>
                                    <li><input type='submit' name='submit_a' value='Delete' class='primary'/></li>
                                </ul>
                            </form>
                            </td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
					?>
                    </tbody>
                </table>

                <br></br>
                <br></br>
                <ul class="actions">
                    <li><a href="addEquipage.php" class="button primary icon fa-plus">Ajouter Membre
                            d'équipage</a></li>
                </ul>
                <table class="table-wrapper">
                    <h3 style="color:red; text-align: center;">Tableau de Membres d'équipage </h3>
                    <thead>
                        <tr>
                            <th>Numéro sécurité sociale</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Salaire</th>
                            <th>Heures de vol</th>
                            <th>Fonction</th>
                            <th>Adresse</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from membre_equipage;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$nom_membre=$row[4];
						$prenom_membre=$row[3];
						$salaire_membre=$row[6];
						$heure_vol_membre=$row[2];
						$fonction=$row[1];
						$numero_ss_membre=$row[0];
						$adresse_membre=$row[5];
						echo " <tr>
							<td>$numero_ss_membre</td>
							<td>$nom_membre</td>
							<td>$prenom_membre</td>
							<td>$salaire_membre</td>
							<td>$heure_vol_membre</td>
							<td>$fonction</td>
                            <td>$adresse_membre</td>
                            <td>
                            <form method='post'>
                            <input type='hidden' name='numero_ss_membre' value='$numero_ss_membre'>
                                <ul class='actions'>
                                    <li><input type='submit' name='submit_e' value='Delete' class='primary'/></li>
                                </ul>
                            </form>
                            </td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
					?>
                    </tbody>
                </table>


                <br></br>
                <br></br>
                <ul class="actions">
                    <li><a href="addVol.php" class="button primary icon fa-plus">Ajouter Vol</a></li>
                </ul>
                <table class="table-wrapper">
                    <h3 style="color:red; text-align: center;">Tableau de vols </h3>
                    <thead>
                        <tr>
                            <th>Numéro vol</th>
                            <th>Début de période</th>
                            <th>Fin de période</th>
                            <th>Heure départ</th>
                            <th>Heure arrivée</th>
                            <th>Numéro immatriculation d'avion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from vol;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$numero_vol=$row[0];
						$debutP=$row[1];
						$finP=$row[2];
						$heureD=$row[3];
						$heureA=$row[4];
						$numero_imm=$row[5];
						echo " <tr>
							<td>$numero_vol</td>
							<td>$debutP</td>
							<td>$finP</td>
							<td>$heureD</td>
							<td>$heureA</td>
                            <td>$numero_imm</td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
					?>
                    </tbody>
                </table>

                <br></br>
                <br></br>
                <ul class="actions">
                    <li><a href="addDepart.php" class="button primary icon fa-plus">Ajouter un départ</a></li>
                </ul>
                <table class="table-wrapper">
                    <h3 style="color:red; text-align: center;">Tableau de départs </h3>
                    <thead>
                        <tr>
                            <th>Place libre</th>
                            <th>Place occupée</th>
                            <th>Date de départ</th>
                            <th>Numéro de vol</th>
                            <th>prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from depart;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$pl=$row[1];
						$pc=$row[2];
						$db=$row[3];
						$Num_vol=$row[4];
						$prix=$row[5];
						echo " <tr>
							<td>$pl</td>
							<td>$pc</td>
							<td>$db</td>
							<td>$Num_vol</td>
							<td>$prix</td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
					?>
                    </tbody>
                </table>

                <br></br>
                <br></br>
                <ul class="actions">
                    <li><a href=" addLiaison.php" class="button primary icon fa-plus">Ajouter laison</a></li>
                </ul>
                <table class="table-wrapper">
                    <h3 style="color:red; text-align: center;">Tableau de liaisons </h3>
                    <thead>
                        <tr>
                            <th>Numéro vol</th>
                            <th>Nom aéroport départ</th>
                            <th>Code aéroport départ</th>
                            <th>Nom aéroport arrivée</th>
                            <th>Code aéroport arrivée</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
					$mysqli = new mysqli("db", "root", "root", "bd");
					$result=$mysqli->multi_query("select * from vol_aeroport;");
					do {
					if ($result = $mysqli->store_result()) {
						$arrayResult= $result->fetch_all();
						foreach($arrayResult as $row){
						$numero_vol_liaison=$row[0];
						$aeropD=$row[1];
						$codeD=$row[2];
						$aeropA=$row[3];
						$codeA=$row[4];
						echo " <tr>
							<td>$numero_vol_liaison</td>
							<td>$aeropD</td>
							<td>$codeD</td>
							<td>$aeropA</td>
                            <td>$codeA</td>
                            <td>
                            <form method='post'>
                            <input type='hidden' name='numero_vol_liaison' value='$numero_vol_liaison'>
                                <ul class='actions'>
                                    <li><input type='submit' name='submit_l' value='Delete' class='primary'/></li>
                                </ul>
                            </form>
                            </td>
						</tr>";}

					}
					}while ($mysqli->more_results() && $mysqli->next_result());
					?>
                    </tbody>
                </table>
                <!-- /Article -->

            </div>
        </div>

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