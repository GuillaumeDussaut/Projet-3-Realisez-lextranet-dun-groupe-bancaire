<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="img/fav_icon_gbaf.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Espace clients - Articles</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
<br>
<center><h1>Acteurs</h1>
<p><a href="index.php">Retour à la page d'accueil.</a></p></center>
<?php                           // Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=clients;port:3306;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

                            // Récupération du de l'acteur 

$req = $bdd->prepare('SELECT id, titre, contenu, logo_acteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM acteurs WHERE id = ?');
$req->execute(array($_GET['acteur']));
$donnees = $req->fetch();
    $likes = $bdd->prepare('SELECT id FROM likes WHERE id_acteur = ?');
    $likes->execute(array($_GET['acteur']));
    $likes = $likes->rowCount();

    $dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_acteur = ?');
    $dislikes->execute(array($_GET['acteur']));
    $dislikes = $dislikes->rowCount();
?>
                                <!--  logo de l'acteur -->
            <?echo $donnees['logo_acteur'] ?>
        
<br><br><br> <center><?php
echo '<div class="logo_acteur2"><img src="img/'.$donnees['logo_acteur'].'" ></div>';
?></center>
        
<div class="form-div3 text-center">


                                <!-- contenu de l'article  -->
<center><h3>
<?php echo htmlspecialchars($donnees['titre']); ?>
</h3></center>   
<p>
<?php
$id_acteur=$_GET['acteur'];

 echo nl2br(htmlspecialchars($donnees['contenu']));

?><br>
                                 <!--système de like/dislike-->
</p>
<div class="likes">
    <a href="includes/like.php?t=1&acteur=<?php echo $id_acteur ?>">J'aime</a> <?php echo $likes ?>
    <br>
    <a href="includes/like.php?t=2&acteur=<?php echo $id_acteur ?>">Je n'aime pas</a> <?php echo $dislikes ?>
</div>
</div>

                                <!--      commentaires      -->
<div class="form-div2 text-center ">

    <h4>Commentaires :</h4><br><br>
<?php
$req->closeCursor(); 

                                   // Récupération des commentaires
$req = $bdd->prepare('SELECT id_user, pseudo, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_acteurs = ? ORDER BY date_commentaire');
$req->execute(array($_GET['acteur']));

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
</div>
<div class="form-div text-center">
        
    <label for="message">Message</label> :  <br><input type="text" name="commentaire" id="commentaire" /><br />

    <input type="submit" name="submit" value="Envoyer" action="Location:commentaires.php?acteur=<?php echo $id_acteur; ?>" />
</p>
</form>
<?php
include 'includes/formulaire_commentaires.php';
?>
</div>

                                <!-- footer -->
<div class="footer">
    <a href="mentions_legales.php" style="color:white">Mentions legales</a>
    <a href="mailto:kickkungfumusique@gmail.com" style="color:white">Nous contacter</a>
</div>



</body>
</html>