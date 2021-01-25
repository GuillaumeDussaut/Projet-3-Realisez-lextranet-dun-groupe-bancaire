<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="img/fav_icon_gbaf.png">
        <meta charset="utf-8">
        <title>Espace clients - Articles</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

    </head>
        
    <body>
                <?php
        include 'header.php';
        ?>
        
        <hr class="barre">
        <br>
        <center><h1>Acteurs</h1>
        <p><a href="index.php">Retour à la page d'accueil.</a></p></center>

 
<?php
                            // Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=clients;port:3306;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

                            // Récupération du billet 

$req = $bdd->prepare('SELECT id, titre, contenu, logo_acteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM acteurs WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
    $likes = $bdd->prepare('SELECT id FROM likes WHERE id_article = ?');
    $likes->execute(array($_GET['billet']));
    $likes = $likes->rowCount();

    $dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ?');
    $dislikes->execute(array($_GET['billet']));
    $dislikes = $dislikes->rowCount();




?>
                                <!--  logo de l'acteur -->
            <?echo $donnees['logo_acteur'] ?>
        
      <br><br><br> <center><?php
    echo '<img src="img/'.$donnees['logo_acteur'].'" name="logo_acteurs" width="50%" height="50%" >';
?></center>
        
<div class="form-div3 text-center">


                                <!-- contenu de l'article  -->
    <center><h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
    </h3></center>   
    <p>
    <?php

    $id_billet=$_GET['billet'];

    echo nl2br(htmlspecialchars($donnees['contenu']));

    ?><br>
                                 <!--système de like/dislike-->
    </p>
<div class="likes">
        <a href="includes/like.php?t=1&billet=<?php echo $id_billet ?>">J'aime</a> <?php echo $likes ?>
        <br>
        <a href="includes/like.php?t=2&billet=<?php echo $id_billet ?>">Je n'aime pas</a> <?php echo $dislikes ?>
</div>
</div>


                                <!--      commentaires      -->


<div class="form-div2 text-center ">

    <h4>Commentaires :</h4><br><br>
<?php
$req->closeCursor(); 


                                    // Récupération des commentaires
$req = $bdd->prepare('SELECT id_user, pseudo, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
<p><strong><u><?php echo htmlspecialchars($donnees['pseudo']); ?>:</u></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>


<?php
} 
$req->closeCursor();
    


?>

</div>

                                    <!--  système de commentaire  -->

<div class="form-div text-center">
                        <h4>Laissez votre commentaire ici :</h4>
    <form method="post" action="">
        <?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
        <?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>
        <p>
        <label for="pseudo">Pseudo</label> : <br><input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <br><input type="text" name="commentaire" id="commentaire" /><br />

        <input type="submit" name="submit" value="Envoyer" action="Location:commentaires.php?billet=<?php echo $id_billet; ?>" />
    </p>
    </form>
    <?php
        include 'includes/coms.php';
    ?>

</div>

        <?php
        include 'footer.php';
        ?>
</body>
</html>