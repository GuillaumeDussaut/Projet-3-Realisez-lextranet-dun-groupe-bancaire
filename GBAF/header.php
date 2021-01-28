<!DOCTYPE html>
<html>
	<head>
		<link rel="stylsheet" type="text/css" href="css/style.css">
		<div class="header">
		
		<center><a href="index.php"><div class="logo_GBAF"><img src="img/logo_gbaf.png" width=10%;></div></a></center>
	</head>
	<body>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<div class="text-header">
				<center><h4>Le groupement banques assurances</h4></center>
			</div>
				<br><br>
			</div>
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
	</body>
</html>