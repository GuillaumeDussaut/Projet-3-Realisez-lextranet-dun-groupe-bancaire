<?php
include 'includes/formulaire_connexion.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="img/fav_icon_gbaf.png">
        <title>Espace Client - Connexion</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
<div class="form-div3 text-center">
    <h3>Espace Client - Connexion</h3>
    <a href="index.php">Accueil</a>
    <a href="inscription.php">S'inscrire</a>
</div>
<div class="form-div text-center">
    <h3>Connexion</h3>
<?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
<?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>
<form method="post" action="">

    <span>Adresse Email :</span><br>
    <input type="email" name="email" placeholder="email"><br>

    <span>Mot de passe :</span><br>
    <input type="password" name="password" placeholder="Mot de passe"><br><br>

<button type="submit" name="submit" value="se connecter">Se connecter</button>
</form> 

<br><br>
<a href="MotDePass_oublie.php">Mot de pass oublié?</a>
</div>

                                <!-- footer -->
<div class="footer">
    <a href="mentions_legales.php" style="color:white">Mentions legales</a>
    <a href="mailto:kickkungfumusique@gmail.com" style="color:white">Nous contacter</a>
</div>




    </body>
</html>
