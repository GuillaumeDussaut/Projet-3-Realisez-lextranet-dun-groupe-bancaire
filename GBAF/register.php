
<?php

session_start();

include 'includes/database.php';
include 'includes/regis_form.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Espace Client - Inscription</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
        include 'includes/header.php'
        ?>
        <hr style="height: 2px; color: black; background-color: black; width: 90%; border: none;">
        <div class="text-center">
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

                <input type="submit" name="submit" value="S'inscrire">
            </form> 
        </div>
        <?php
        include 'includes/footer.php'
        ?>
    </body>
</html>