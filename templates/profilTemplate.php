<?php
	$login = User::get_login();
?>

<div id="contentUser">

	<h2>Hey <?php echo User::getPrenom($login) ?>, bienvenue sur ton profil !</h2>
	
	<div id="avatar">
		<img src="../images/anonymous.png" alt="avatarAn" style="width:200px;height:200px">
	</div>
	
	<div id="info_perso">
		<div id="cellule"><h1>Tes infos</h1> </div>
		<div id="cellule">Nom : <?php echo User::getNom($login) ?></div> 
		<div id="cellule">Prénom : <?php echo User::getPrenom($login) ?></div>
		<div id="cellule">Mail : <?php echo User::getMail($login) ?> </div>
	</div>
	
	<div id="stats">
		<div id="cellule"><h1>Tes stats</h1></div>
		<div id="cellule">Nombre de parties gagnées : </div>
	</div>
	
	
	
</div>
