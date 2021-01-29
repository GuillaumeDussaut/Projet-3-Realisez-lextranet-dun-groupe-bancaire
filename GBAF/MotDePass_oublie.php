<?php
    include 'includes/formulaire_MotDePass_oublie.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="shortcut icon" type="image/png" href="img/fav_icon_gbaf.png">
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Mot de pass oublié</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>                   
    <body>

                            <!-- header -->
<div class="header">        
    <center><a href="index.php"><div class="logo_GBAF"><img src="img/logo_gbaf.png" width=10%;></div></a></center>
        
        
<div class="text-header">
    <center><h4>Le groupement banques assurances</h4></center>
</div>
<br><br>
</div>
<div class="e-membre">
<?php if (isset($_SESSION['userEmail'])) { ?>
    <div class="membre">
        <a href="espace_membre.php"><br><img src="img/avatar.png" class="avatar"></a>
        <br><strong><?=htmlentities(trim($_SESSION['userPrenom'])); ?></strong>
        <strong><?=htmlentities(trim($_SESSION['userNom'])); ?></strong><br>

        <a href="deconnexion.php">Se déconnecter</a>
<?php }  else { ?>        
<?php } ?>

</div>
</div>
                        <!-- fin header -->

<hr class="barre">
<div class="form-div text-center">
<?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
<?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>

<form method="post" action="">

<span>Adresse Email :</span><br>
<input type="email" name="email" placeholder="email"><br>

<br><select name="choix">
    <option value="choix" selected>Choisissez</option>
    <option value="choix1" name="choix1">Nom de jeune fille de votre mère?</option>
    <option value="choix2" name="choix2">Nom de votre premier animal de compagnie?</option>
    <option value="choix3" name="choix3">Ou êtes-vous né?</option>
</select><br>

<span>Réponse :</span><br>
<input type="text" name="reponse" placeholder="réponse secrète"><br>

<br><input type="submit" name="submit" value="envoyer"></button>  

<br><br><a href="index.php">Accueil</a> 
</form> 
</div>

                    <!-- footer -->
<div class="footer">
    <a href="mentions_legales.php" style="color:white">Mentions legales</a>
    <a href="mailto:kickkungfumusique@gmail.com" style="color:white">Nous contacter</a>
</div>



                   	
    </body>               
</html>  

                                 