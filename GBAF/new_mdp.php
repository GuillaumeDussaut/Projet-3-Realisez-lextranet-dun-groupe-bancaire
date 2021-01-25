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
                    var_dump($post['password']);
                    var_dump($_SESSION);
                    
                            $newPassword = password_hash($post['password'], PASSWORD_DEFAULT);
                            $requestUserTest = $database->prepare('UPDATE users SET user_password = :user_password WHERE user_email = :user_mail');
                            $requestUserTest->bindvalue(':user_password', $newPassword, PDO::PARAM_STR);
                            if($requestUserTest->execute()){

                            $succesMessage=' Nouveau mot de pass enregistré!';
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
    </head>
    <body>
        <?php
        include 'header.php'
        ?>
        <hr style="height: 2px; color: black; background-color: black; width: 50%; border: none;">
        <div class="text-center">
            <h3>Nouveau Mot de pass</h3>          
        </div>

        <br><br>
        <center><img src="img/avatar-grand.png" width=10%></center>
        <div class="form-div text-center">
                <h3>Information</h3>
                <?php if (isset($_SESSION['userEmail'])) { ?>                       
                        <br>
                        <h3>Changer de mot de passe</h3>
                        <?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
                        <?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>
                        <form method="post" action="">
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
        <?php
        include 'footer.php'
        ?>
    </body>
</html>
