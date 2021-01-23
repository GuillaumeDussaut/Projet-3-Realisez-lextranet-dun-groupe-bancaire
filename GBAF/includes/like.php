<?php 

session_start();

$database = new PDO('mysql:host=localhost;dbname=clients;charset=utf8', 'root', '');


if(isset($_GET['billet']) && !empty($_GET['billet'])) {
	$getid = (int) $_GET['billet'];
	$gett = (int) $_GET['t'];

	$sessionid = $_SESSION['userID'];

	$check=$database->prepare('SELECT SELECT id, titre, contenu, logo_acteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM acteurs WHERE id = ?');
	$check->execute(array($getid));

	if($check->rowCount() == 0){

		if($gett == 1){
		$check_like = $database->prepare('SELECT id FROM likes WHERE id_article = ? AND id_membre = ?');
		$check_like->execute(array($getid, $sessionid));
			if($check_like->rowCount() == 1){
				$del = $database->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
				$del->execute(array($getid, $sessionid));


		}else{
			$ins= $database->prepare('INSERT INTO likes (id_article, id_membre) VALUES (?, ?)');
			$ins->execute(array($getid, $sessionid));

			$del = $database->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
			$del->execute(array($getid, $sessionid));
		}
		}elseif($gett ==2){
					$check_like = $database->prepare('SELECT id FROM dislikes WHERE ? = id_article AND id_membre = ?');
		$check_like->execute(array($getid, $sessionid));
			if($check_like->rowCount() == 1){
				$del = $database->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
				$del->execute(array($getid, $sessionid));
		}else{
			$ins= $database->prepare('INSERT INTO dislikes (id_article, id_membre) VALUES (?, ?)');
			$ins->execute(array($getid, $sessionid));

				$del = $database->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
				$del->execute(array($getid, $sessionid));
		}



		}
		header('Location: http://localhost/P3_Dussaut_Guillaume/GBAF/commentaires.php?billet=' .$getid);
	} else {echo 'erreur 2';}

} else {echo 'erreur 1';}
 
           
?>


