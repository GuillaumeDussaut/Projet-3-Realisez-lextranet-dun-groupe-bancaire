<?php 

include 'database.php';

if (isset($_SESSION['userEmail'])) {
    header('Location:index.php');
}


$post=[];


if (isset($_POST['submit'])) {
    $database = getPDO();
        if ((!empty($email)) && (!empty($password))) {
            
        } else {
           
        
        

    $post=array_map('htmlspecialchars', $_POST);
    
    $requestUser = $database->prepare('SELECT * FROM users WHERE user_email = :user_email' );

                

    $requestUser->bindValue(':user_email', $post['email']);


    if ($requestUser->execute())
    {
        $userCount= $requestUser->fetch(PDO::FETCH_ASSOC);



        if(!empty($userCount))
        {
            if(password_verify($post['password'], $userCount['user_password']))
            {
                        if ($post['password']=$userCount['user_password']) 
                            {
        
        session_start();
        $_SESSION['userID'] = $userCount['user_id']; 
        $_SESSION['userPseudo'] = $userCount['user_pseudo']; 
        $_SESSION['userPrenom'] = $userCount['user_prenom'];
        $_SESSION['userNom'] = $userCount['user_nom'];
        $_SESSION['userEmail'] = $userCount['user_email'];
        $_SESSION['choix'] = $userCount['question'];
        $_SESSION['reponse'] = $userCount['reponse'];
        header('refresh:1;url=index.php');

        $succesMessage ='Vous êtes maintenant connectés!';
                            } 


             

    }else{
        $errorMessage =' mot de pass incorrect';
    }

        }
    }
    }
}

?>