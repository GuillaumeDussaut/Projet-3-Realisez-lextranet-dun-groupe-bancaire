<?php

session_start();

include 'includes/database.php';


$VotreAdresseMail="admin@wampserver.invalid";
if(isset($_POST['envoyer'])) { 
    if(empty($_POST['mail'])) {
        echo "Le champ mail est vide";
    } else {
        
        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['mail'])){
            echo "L'adresse mail entrée est incorrecte";
        }else{
            
            if(empty($_POST['sujet'])) {
                echo "Le champ sujet est vide";
            }else{
                
                if(empty($_POST['message'])) {
                    echo "Le champ message est vide";
                }else{
                    
                    
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
                    $Entetes .= "From: Nom de votre site <".$_POST['mail'].">\r\n";
                    $Entetes .= "Reply-To: Nom de votre site <".$_POST['mail'].">\r\n";
                    
                    $Mail=$_POST['mail']; 
                    $Sujet='=?UTF-8?B?'.base64_encode($_POST['sujet']).'?=';
                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");
                    if(mail($VotreAdresseMail,$Sujet,nl2br($Message),$Entetes)){
                        echo "Le mail à été envoyé avec succès!";
                    } else {
                        echo "Une erreur est survenue, le mail n'a pas été envoyé";
                    }
                }
            }
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
include 'includes/header.php'
?>
        <hr style="height: 2px; color: black; background-color: black; width: 50%; border: none;">
        <div class="text-center">
            <h3>Espace Client - Inscription</h3>
            <a href="index.php">Accueil</a>
        </div><br><br><br>
<center><form action="contact.php" method="post">
    <?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
    <?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>
    Mail: <input type="text" name="mail" value="" />
    <br><br>
    Sujet: <input type="text" name="sujet" value="" />
    <br><br>
    Message: <textarea name="message" cols="40" rows="20"></textarea>
    <br><br>
    <input type="submit" name="envoyer" value="Envoyer" />
    <br><br>
</form></center>
<?php
include 'includes/footer.php'
?>
</body>
</html>