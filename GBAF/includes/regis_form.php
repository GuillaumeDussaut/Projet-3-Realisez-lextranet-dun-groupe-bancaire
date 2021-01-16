<?php
if (isset($_SESSION['userEmail'])) {
    header('Location:index.php');
}

if (isset($_POST['submit'])){
    
    /*$pseudo = htmlentities($_POST['pseudo']);
    $email = htmlentities($_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $password_confirm = mysqli_real_escape_string($connect, $_POST['password_confirm']);
    date_default_timezone_set('Europe/Paris');
    $date = date('d/m/Y à H:i:s');*/
$post=array_map('htmlspecialchars', $_POST);
$email=$post['email'];
$pseudo=$post['pseudo'];
$prenom=$post['prenom'];
$nom=$post['nom'];
$password=$post['password'];
$password_confirm=$post['password_confirm'];
    
                                // CONDITIONS // 


    if ((!empty($pseudo)) &&(!empty($prenom)) &&(!empty($nom)) && (!empty($email)) && (!empty($password_confirm)) && (!empty($password))) {
        if (strlen($pseudo) <= 16) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($password == $password_confirm) {

                    $database = getPDO();
                    $rowEmail = countDatabaseValue($database, 'user_email', $email);
                    if ($rowEmail == 0) {
                        $rowPseudo = countDatabaseValue($database, 'user_pseudo', $pseudo);
                        if ($rowPseudo == 0) {
                            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            $insertMember = $database->prepare("INSERT INTO users(user_pseudo, user_prenom, user_nom, user_email, user_password) VALUES(?, ?, ?, ?, ?)");
                            $insertMember->execute([
                                $pseudo,
                                $prenom,
                                $nom,
                                $email,
                                $password,
                            ]);
                            $succesMessage = "Votre compte à bien été créé !";
                            header('refresh:3;url=login.php');
                        } else {
                            $errorMessage = 'Cette pseudo est déjà utilisée..';
                        }
                    } else {
                        $errorMessage = 'Cette email est déjà utilisée..';
                    }
                } else {
                    $errorMessage = 'Les mots de passes ne correspondent pas...';
                }
            } else {
                $errorMessage = "Votre email n'est pas valide...";
            }
        } else {
            $errorMessage = 'Le pseudo est trop long...';
        }
    } else {
        $errorMessage = 'Veuillez remplir tous les champs...';
    }
}
?>
