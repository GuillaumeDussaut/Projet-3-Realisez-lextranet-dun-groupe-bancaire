<?php
if (isset($_SESSION['userEmail'])) {
    header('Location:index.php');
}

if (isset($_POST['submit'])){

    $post=array_map('htmlspecialchars', $_POST);
    $email=$post['email'];
    $pseudo=$post['pseudo'];
    $prenom=$post['prenom'];
    $nom=$post['nom'];
    $password=$post['password'];
    $password_confirm=$post['password_confirm'];
    $choix = $post['choix'];
    $reponse_secrete=$post['reponse'];
      
                                // CONDITIONS // 
if ((!empty($pseudo)) &&(!empty($prenom)) &&(!empty($nom)) && (!empty($email)) && (!empty($password_confirm)) && (!empty($password)) && (!empty($choix)) && (!empty($reponse_secrete))) {

if (strlen($pseudo) <= 50) {

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

if ($password == $password_confirm) {
    $database = getPDO();
    $rowEmail = countDatabaseValue($database, 'user_email', $email);

if ($rowEmail == 0) {
    $rowPseudo = countDatabaseValue($database, 'user_pseudo', $pseudo);

if ($rowPseudo == 0) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);                           
    $insertMember = $database->prepare("INSERT INTO users(user_pseudo, user_prenom, user_nom, user_email, user_password, question, reponse) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $insertMember->execute([
    $pseudo,
    $prenom,
    $nom,
    $email,
    $password,
    $choix,
    $reponse_secrete,
    ]);
    $succesMessage = "Votre compte à bien été créé !";
header('refresh:3;url=login.php');
}else{
    $errorMessage = 'Cette pseudo est déjà utilisée..';
}
}else{
    $errorMessage = 'Cette email est déjà utilisée..';
}
}else{
    $errorMessage = 'Les mots de passes ne correspondent pas...';
}
}else{
    $errorMessage = "Votre email n'est pas valide...";
}
}else{
    $errorMessage = 'Le pseudo est trop long...';
}
}else{
    $errorMessage = 'Veuillez remplir tous les champs...';
}
}
?>
