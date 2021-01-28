
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
    </head>
    <body>
        <?php
        include 'header.php'
        ?>
        <hr class="barre">
        <div class="form-div3 text-center">
            <h3>Espace Client - Inscription</h3>
            <a href="index.php">Accueil</a>
            <a href="login.php">Se Connecter</a>
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
        <?php
        include 'footer.php'
        ?>
    </body>
</html>