<!DOCTYPE html>
<html lang="fr">
                   

<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Mot de pass oublié</title>
    </head>
    <?php 
    	include 'includes/header.php';
    ?>
    <hr style="height: 2px; color: black; background-color: black; width: 50%; border: none;">
                   
    <body>


<div class="form-div text-center">
        <span>Pseudo :</span><br>
        <input type="pseudo" name="pseudo" placeholder="pseudo"><br>

        <span>Adresse Email :</span><br>
        <input type="email" name="email" placeholder="email"><br>


        <br><button type="submit">Envoyer</button>  

        <br><br><a href="index.php">Accueil</a>   
</div>


    <?php 
    	include 'includes/footer.php';
    ?>
                   	
    </body>               
</html>                                      