<?php            
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=clients;port:3306;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT id, titre, contenu, logo_acteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM acteurs ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch())

{
?>

<div class="news">
    <center><h3>
    <?php echo htmlspecialchars($donnees['titre']); ?>
    </h3></center>    
<p>       
        <?echo $donnees['logo_acteur'] ?>
        
    <center> <br><?php
    echo '<img src="img/'.$donnees['logo_acteur'].'"width="30%" height="30%">';
    ?><br></center>
<?php
echo nl2br(htmlspecialchars($donnees['contenu']));    
?>
<br>
    <em><a href="commentaires.php?acteur=<?php echo $donnees['id']; ?>">cliquez ici pour plus de détails.</a></em>
</p>
<?php 
    $likes = $bdd->prepare('SELECT id FROM likes WHERE id_acteur = ?');
    $likes->execute(array($donnees['id']));
    $likes = $likes->rowCount();

    $dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_acteur = ?');
    $dislikes->execute(array($donnees['id']));
    $dislikes = $dislikes->rowCount();
?>
    <img src="img/like.png" alt="image1" style="display:inline-block; height: 3%; width:3%;"> <?php echo $likes ?>
    <img src="img/dislike.png" alt="image2" style="display:inline-block; height: 3%; width:3%;"> <?php echo $dislikes ?>
</div>
<?php
}
$req->closeCursor();
?>
