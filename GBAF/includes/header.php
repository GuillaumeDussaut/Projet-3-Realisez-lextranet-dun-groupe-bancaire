
<div class="color-fond">
<center><a href="index.php"><img src="img/logo_gbaf.png" width=10%;></a></center>

<div class="header">
	<h4>Le groupement banques assurances</h4>
</div>
<br><br>
<?php if (isset($_SESSION['userEmail'])) { ?>
	<div class="membre">
	<a href="e_membre.php"><br><img src="img/avatar.png"></a>
	<br><strong><?=htmlentities(trim($_SESSION['userPrenom'])); ?></strong>
	<strong><?=htmlentities(trim($_SESSION['userNom'])); ?></strong><br>

	<a href="logout.php">Se déconnecter</a>
	</div>

<?php }  else { ?>

	
	
        
                <?php } ?>

</div>
