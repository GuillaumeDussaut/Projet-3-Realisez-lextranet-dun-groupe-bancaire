<?php

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=clients;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$post=[];

if(isset($_POST['submit'])){

	$req = $bdd->prepare('SELECT id, titre, contenu, logo_acteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM acteurs WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();


$id_billet=$_GET['billet'];
$sessionid=$_SESSION['userID'];


	$check=$bdd->prepare('SELECT SELECT id, titre, contenu, logo_acteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM acteurs WHERE id = ?');
	$check->execute(array($id_billet));

	if($check->rowCount() == 0){
		$check_com = $bdd->prepare('SELECT id FROM commentaires WHERE id_billet = ? AND id_user = ?');
		$check_com->execute(array($id_billet, $sessionid));
			if($check_com->rowCount() == 1){
				$errorMessage = 'vous avez déjà laissé un commentaire!';
			}else{
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaires (id_billet, id_user, pseudo, commentaire) VALUES(?, ?, ?, ?)');
$req->execute(array($id_billet, $sessionid, $_POST['pseudo'], $_POST['commentaire']));
$succsMessage = 'Ton commentaire a bien été envoyé!';
header('commentaires.php?billet=$id_billet;');
}
}
}




?>
