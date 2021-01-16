<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Espace clients - Articles</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
    </head>
        
    <body>
                <?php
        include 'includes/header.php';
        ?>
        
        <hr style="height: 2px; color: black; background-color: black; width: 90%; border: none;">
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

                            // Récupération du billet -->
$req = $bdd->prepare('SELECT id, titre, contenu, img, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM Acteurs WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();

?>

<div class="form-div3 text-center">
    <center><img src=" echo $donnees['img']; " alt="image"></center><br><br>
    <center><h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        
    </h3></center>

    
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?><br>
    </p>
</div>


                            <!--commentaires, mettre les like/disslike -->


<div class="form-div2 text-center ">
    <h4>Commentaires :</h4><br><br>
<?php
$req->closeCursor();


$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
<?php
} 
$req->closeCursor();
    
    

?>

</div>

<div class="form-div text-center">
                        <h4>Laissez votre commentaire ici :</h4>
    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <br><input type="text" name="auteur" id="auteur" /><br />
        <label for="message">Message</label> :  <br><input type="text" name="commentaire" id="commentaire" /><br />

        <input type="submit" value="Envoyer" />
    </p>
    </form>
    <?php
    include 'includes/coms.php';
    ?>

</div>

        <?php
        include 'includes/footer.php';
        ?>
</body>
</html>