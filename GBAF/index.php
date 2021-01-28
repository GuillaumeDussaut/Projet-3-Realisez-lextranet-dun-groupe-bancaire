<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Espace Client - Accueil</title>
        <link rel="shortcut icon" type="image/png" href="img/fav_icon_gbaf.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
<?php
include 'header.php';
?>
        
        
<div class="text-center">
    <h3>Espace Client - Accueil</h3>
</div>

                            <!-- debut condition (si connecté...) -->
<?php if (isset($_SESSION['userEmail'])) { ?>
   

<br><br>
<center><h1>Présentation du groupe GBAF</h1></center>

<center><h4>Le Groupement Banque Assurance Français (GBAF) est une fédération
représentant les 6 grands groupes français :</h4></center><br><br>
    <ul>
        <li> BNP Paribas ;</li>
        <li>BPCE ;</li>
        <li>Crédit Agricole ;</li>
        <li>Crédit Mutuel-CIC ;</li>
        <li>Société Générale ;</li>
        <li>La Banque Postale</li>
    </ul>
<center><p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler
de la même façon pour gérer près de 80 millions de comptes sur le territoire
national.
Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
les axes de la réglementation financière française. Sa mission est de promouvoir
l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
pouvoirs publics.</p></center>
<br><br>
<center><img src="img/img_accueil.jpeg" class="accueil"></center>
<br><br>

                    <!-- zone blog avec les articles -->
<?php
include 'includes/acteurs.php';
?>
                    <!-- fin zone blog + debut condition (si pas connecté...) -->
<?php }  else { ?>

<center><h1>Veuillez vous connecter.</h1><a href="connexion.php">Se connecter</a></center>
<center><p>Pas encore inscrit? cliquez ici pour créer votre compte : <a href="Inscription.php">S'inscrire</a></p></center>
<?php } ?>
            
<?php
include 'footer.php';
?>

    </body>
</html>