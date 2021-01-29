<?php
session_start();
include 'includes/database.php';

if(isset($_SESSION['userEmail'])){
}
$post=[];

if (isset($_POST['submit'])) {

    $database = getPDO();
if((!empty($newpasword)) && (!empty($confirm_newpassword))){
            $errorMessage = 'veuillez remplir tous les champs!';
}else{

    $post=array_map('htmlspecialchars', $_POST);
    $requestUser = $database->prepare('SELECT * FROM users where user_email = :user_email');
    $requestUser->bindvalue(':user_email', $post['email']);

if($requestUser->execute())
{
    $userCount = $requestUser->fetch(PDO::FETCH_ASSOC);
if($post['password'] = $post['confirm_password']){
if($post['email'] = $userCount['user_email']){
    $newPassword = password_hash($post['password'], PASSWORD_DEFAULT);
    $requestUser = $database->prepare("UPDATE users SET user_password = ? WHERE user_email = ?");
    $requestUser->execute([
    $newPassword,
    $_SESSION['userEmail'],
    ]);
    session_destroy();
    header('refresh:3;url=connexion.php');

    $succesMessage='Nouveau mot de pass enregistré!';
}else{
    var_dump($requestUser->errorInfo());
}                 
}else{
    $errorMessage = 'les deux mdp ne correspondent pas!' ;
}
}
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Espace Client - Accueil</title>
        <link rel="shortcut icon" type="image/png" href="img/fav_icon_gbaf.png">
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
<div class="text-center">
    <h3>Nouveau Mot de pass</h3>          
</div>
<br><br>

<div class="form-div text-center">
    <h3>Information</h3>
<?php if (isset($_SESSION['userEmail'])) { ?>                       
<br>
    <h3>Changer de mot de passe</h3>
<?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
<?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>
<form method="post">
    <span>Adresse email :</span><br>
    <input type="email" name="email" placeholder="Adresse email"><br>

    <span>Nouveau Mot de passe :</span><br>
    <input type="password" name="password" placeholder="Nouveau Mot de passe"><br>

    <span>Confirmation du Nouveau Mot de passe :</span><br>
    <input type="password" name="confirm_password" placeholder="Confirmation Mot de passe"><br><br>
    <input type="submit" name="submit" value="Valider">
</form>
<?php  } else { ?>
<p>Vous n'êtes pas connecté !</p>
<?php } ?>
</div>
                        <!-- footer -->
<div class="footer">
    <a href="mentions_legales.php" style="color:white">Mentions legales</a>
    <a href="mailto:kickkungfumusique@gmail.com" style="color:white">Nous contacter</a>
</div>




    </body>
</html>
