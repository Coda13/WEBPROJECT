<?php
	$login = User::get_login();
?>

<div id="content">

	<h2>Hey <?php echo User::getPrenom($login) ?>, bienvenue sur ton profil !</h2>
	
	<div id="avatar">
		<img src="../images/anonymous.png" alt="avatarAn" style="width:100px;height:100px">
	</div>
	
	<div id="info_perso">
		<h1>Tes infos </h1>
		<p>Nom : <?php echo User::getNom($login) ?></p> 
		<p>Prénom : <?php echo User::getPrenom($login) ?></p>
		<p>Mail : <?php echo User::getMail($login) ?> </p>
	</div>
	
	<div id="stats">
		<h1>Tes stats</h1>
		<p>Nombre de parties gagnées : </p>
	</div>
	
	
	
</div>
