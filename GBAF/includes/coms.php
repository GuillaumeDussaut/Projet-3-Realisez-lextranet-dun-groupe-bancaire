<?php
                             /* ajouter écriture id_billet */
include 'database.php';


if (isset($_POST['submit'])){



$pseudo = $post['auteur'];
$message = $post['commentaire'];

$ins= $bdd->prepare('INSERT INTO billets (auteur, commentaire) VALUES (?, ?)');
$ins->execute([
    $pseudo,
    $message,
]);

}

?>