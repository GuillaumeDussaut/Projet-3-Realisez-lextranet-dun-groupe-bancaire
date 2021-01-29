
<?php

session_start();
include 'includes/database.php';
include 'includes/Formulaire_inscription.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="img/fav_icon_gbaf.png">
        <title>Espace Client - Inscription</title>
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
    <h3>Espace Client - Inscription</h3>
    <a href="index.php">Accueil</a>
    <a href="connexion.php">Se Connecter</a>
</div>
<div class="form-div text-center">
    <h3>Inscription</h3>
<?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
<?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>
<form method="post" action="">

<span>Pseudo :</span><br>
<input type="text" name="pseudo" placeholder="Pseudo" <?php if (isset($pseudo)) { ?>value="<?= $pseudo ?>" <?php } ?>><br>

<span>Prénom :</span><br>
<input type="text" name="prenom" placeholder="prenom" <?php if (isset($prenom)) { ?>value="<?= $prenom ?>" <?php } ?>><br>

<span>Nom</span><br>
<input type="text" name="nom" placeholder="nom" <?php if (isset($nom)) { ?>value="<?= $nom ?>" <?php } ?>><br>

<span>Adresse Email :</span><br>
<input type="email" name="email" placeholder="Email" <?php if (isset($email)) { ?>value="<?= $email ?>" <?php } ?>><br>

<span>Mot de passe :</span><br>
<input type="password" name="password" placeholder="Mot de passe"><br>

<span>Confirmation Mot de passe :</span><br>
<input type="password" name="password_confirm" placeholder="Confirmation Mot de passe"><br><br>

<select name="choix">
    <option value="choix" selected>Choisissez</option>
    <option value="choix1">Nom de jeune fille de votre mère?</option>
    <option value="choix2">Nom de votre premier animal de compagnie?</option>
    <option value="choix3">Ou êtes-vous né?</option>
</select><br><br>

<span>Réponse secrète : :</span><br>
<input type="text" name="reponse" placeholder="reponse"><br><br>

<input type="submit" name="submit" value="S'inscrire">
</form> 
</div>
                            <!-- footer -->
<div class="footer">
    <a href="mentions_legales.php" style="color:white">Mentions legales</a>
    <a href="mailto:kickkungfumusique@gmail.com" style="color:white">Nous contacter</a>
</div>




    </body>
</html>