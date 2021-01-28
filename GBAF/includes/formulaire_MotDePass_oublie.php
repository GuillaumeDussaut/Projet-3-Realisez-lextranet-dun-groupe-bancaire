<?php

include 'database.php';


if (isset($_SESSION['userEmail'])) {
    header('Location:index.php');
}


$post=[];
if (isset($_POST['submit'])) {


$database = getPDO();
$post=array_map('htmlspecialchars', $_POST);
$email=$post['email'];
$choix = $post['choix'];
$reponse_secrete=$post['reponse'];



if(!empty($email) AND !empty($reponse_secrete)){

    
$post=array_map('htmlspecialchars', $_POST);
$requestUser = $database->prepare('SELECT * FROM users WHERE user_email = :user_email');


$requestUser->bindValue(':user_email', $post['email']);

if($requestUser->execute()){
    $userCount = $requestUser->fetch(PDO::FETCH_ASSOC);
    
if(!empty($userCount)){
              

if($post['choix'] == $userCount['question']){
    $succesMessage = $userCount['question'];
    $succesMessage = 'bonjour';

if ($post['reponse']==$userCount['reponse']){              
    
    
session_start();
    $_SESSION['userID'] = $userCount['user_id']; 
    $_SESSION['userPseudo'] = $userCount['user_pseudo']; 
    $_SESSION['userPrenom'] = $userCount['user_prenom'];
    $_SESSION['userNom'] = $userCount['user_nom'];
    $_SESSION['userEmail'] = $userCount['user_email'];
    $_SESSION['choix'] = $userCount['question'];
    $_SESSION['reponse'] = $userCount['reponse'];
header('refresh:1;url=formulaire_nouveau_mot_de_pass.php');
    $succesMessage ='Vous êtes maintenant connectés!';
}else{
    $errorMessage = 'Mauvaise réponse secrète';
}
}else{$errorMessage = 'mauvaise question secrète';
}
    
}
}else{
    $errorMessage = 'Vous n\'avez pas encore de compte!';
}  
}    
}else{$errorMessage = 'Veuillez remplir tous les champs!';
}

?>                                    