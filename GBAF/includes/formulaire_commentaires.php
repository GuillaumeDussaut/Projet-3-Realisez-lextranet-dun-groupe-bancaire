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
	$req->execute(array($_GET['acteur']));
	$donnees = $req->fetch();

	$id_acteur=$_GET['acteur'];
	$sessionid=$_SESSION['userID'];
	$pseudo=$_SESSION['userPseudo'];
	
	$check=$bdd->prepare('SELECT SELECT id, titre, contenu, logo_acteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM acteurs WHERE id = ?');
	$check->execute(array($id_acteur));

if($check->rowCount() == 0){
	$check_com = $bdd->prepare('SELECT id FROM commentaires WHERE id_acteurs = ? AND id_user = ?');
	$check_com->execute(array($id_acteur, $sessionid));

if($check_com->rowCount() == 1){
	$errorMessage = 'vous avez déjà laissé un commentaire!';
}else{

// Insertion du message à l'aide d'une requête préparée
	$req = $bdd->prepare('INSERT INTO commentaires (id_acteurs, id_user, pseudo, commentaire) VALUES(?, ?, ?, ?)');
	$req->execute(array($id_acteur, $sessionid, $pseudo, $_POST['commentaire']));
	$succsMessage = 'Ton commentaire a bien été envoyé!';
header('commentaires.php?acteur=$id_acteur;');
}
}
}
?>
