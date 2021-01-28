<?php
session_start();
include 'includes/database.php'; 

if(isset($_SESSION['userEmail'])){
}
$post=[];
if (isset($_POST['submit'])) {
    $database = getPDO();
if((!empty($oldpassword)) && (!empty($newpasword)) && (!empty($confirm_newpassword))){
    $errorMessage = 'veuillez remplir tous les champs!';
}else{
    $post=array_map('htmlspecialchars', $_POST);
    $requestUser = $database->prepare('SELECT * FROM users where user_email = :user_email');
    $requestUser->bindvalue(':user_email', $post['email']);

if($requestUser->execute())
{
    $userCount = $requestUser->fetch(PDO::FETCH_ASSOC);

if($post['password'] = $post['confirm_password']){
if(password_verify($post['old_password'], $userCount['user_password']))
{
if($post['old_password']=$userCount['user_password'])
{
    $newPassword = password_hash($post['password'], PASSWORD_DEFAULT);
    $requestUser = $database->prepare("UPDATE users SET user_password = ? WHERE user_email = ?");
    $requestUser->execute([
    $newPassword,
    $_SESSION['userEmail'],
    ]);
    $succesMessage=' Nouveau mot de pass enregistré!';
}
}else{
    $errorMessage = 'ancien mdp incorrect';                    
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
        <link rel="shortcut icon" type="image/png" href="img/fav_icon_gbaf.png">
        <title>Espace Client - Accueil</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
<?php
include 'header.php'
?>
<hr class="barre">
<div class="text-center">
    <h3>Espace Client</h3>
    <a href="index.php">Accueil</a>
</div>
<br><br>
<center><img src="img/avatar-grand.png" width=10%></center>
<div class="form-div text-center">
    <h3>Information</h3>
<?php if (isset($_SESSION['userEmail'])) { ?>
<p>Bonjour, <?= $_SESSION['userPrenom']?> <?=$_SESSION['userNom']?>!</p>
<p>Email : <?= $_SESSION['userEmail'] ?></p>
<p>Pseudo : <?= $_SESSION['userPseudo'] ?></p>

<a href="deconnexion.php"> Se Déconnecter</a>
<br>
<h3>Changer de mot de passe</h3>
<?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
<?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>
<form method="post" action="">

    <span>Adresse email :</span><br>
    <input type="email" name="email" placeholder="Adresse email"><br>

    <span>Ancien Mot de passe :</span><br>
    <input type="password" name="old_password" placeholder="Ancien Mot de passe"><br>

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
<?php
include 'footer.php'
?>

    </body>
</html>