<?php
include 'includes/login_form.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Espace Client - Connexion</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
         <?php
       include 'includes/header.php' 
        ?> 
        <hr style="height: 2px; color: black; background-color: black; width: 90%; border: none;">
        <div class="text-center">
            <h3>Espace Client - Connexion</h3>
            <a href="index.php">Accueil</a>
            <a href="register.php">S'inscrire</a>
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

                <button type="submit">Se connecter</button>
            </form> 

            <br><br>
            <a href="pass_oublie.php">Mot de pass oublié?</a>
        </div>
        <?php
        include 'includes/footer.php'
        ?>
    </body>
</html>
