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
    </head>                   
    <body>

<?php 
include 'header.php';
?>
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
<?php 
    include 'footer.php';
?>
                   	
    </body>               
</html>  

                                 