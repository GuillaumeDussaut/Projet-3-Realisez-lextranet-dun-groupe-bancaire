<?php
session_start();
include 'includes/database.php'; 

if(isset($_SESSION['userEmail'])){

}
$post=[];

if (isset($_POST)) {

    $database = getPDO();
        if((!empty($oldpassword)) && (!empty($newpasword)) && (!empty($confirm_newpassword))){
        }else{

            $post=array_map('htmlspecialchars', $_POST);

            $requestUser = $database->prepare('SELECT * FROM users where user_email = :user_email');

                    /* erreur ici, sur le 'email'*/


            $requestUser->bindvalue(':user_email', $post['email']);

        if($requestUser->execute())
        {
            $userCount = $requestUser->fetch(PDO::FETCH_ASSOC);

            if(!empty($userCount))
                if(password_verify($post['old_password'], $userCount['user_password']))
                {
                    if($post['old_password']=$userCount['user_password'])
                    {
                        $newPassword = password_hash($post['password'], PASSWORD_DEFAULT);
                        $requestUser = $database->prepare("UPDATE users SET user_password = ? WHERE user_email = ?");
                        $requestUser->execute([
                        $newPassword,
                        $_SESSION['userEmail'],
                        ]);}
                       
                }else{
                    echo 'erreure';
                }
        }
}
        }


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Espace Client - Accueil</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
        include 'includes/header.php'
        ?>
        <hr style="height: 2px; color: black; background-color: black; width: 50%; border: none;">
        <div class="text-center">
            <h3>Espace Client</h3>

            <a href="index.php">Accueil</a>
            
        </div>
        <br><br>
        <center><img src="img/avatar-grand.png" width=10%></center>
        <div class="form-div text-center">
                <h3>Information</h3>
                <?php if (isset($_SESSION['userEmail'])) { ?>

                        <p>Bonjour, <?= $_SESSION['userPseudo'] ?> !</p>
                        <p>Email : <?= $_SESSION['userEmail'] ?></p>
                        <p>Prenom : <?= $_SESSION['userPrenom'] ?></p>
                        <p>Nom : <?= $_SESSION['userNom'] ?></p>
                        <a href="logout.php"> Se Déconnecter</a>
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
                            <input type="password" name="password" placeholder="Nouveau Mot de passe"><br><br>

                            <span>Confirmation du Nouveau Mot de passe :</span><br>
                            <input type="password" name="confirm_password" placeholder="Confirmation Mot de passe"><br><br>

                            <input type="submit" name="submit" value="Valider">
                        </form>
                        
                    <?php  } else { ?>
                    <p>Vous n'êtes pas connecté !</p>
                <?php } ?>
        </div>
        <?php
        include 'includes/footer.php'
        ?>
    </body>
</html>