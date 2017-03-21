<?php
	$login = User::get_login();
?>

<div id="contentUser">

	<h2>Salut <?php echo User::getPrenom($login) ?> !</h2>
	
	<p>Tu as envie de rejoindre une partie? Consulte les parties en cours !</p>
	
	<p>Tu ne te rappelles plus comment jouer, consulte les <a href="index.php?controller=user&action=viewRegles">règles du jeu</a> !</p>
	
	<div id="lastPlayed">Dernières parties jouées :</div>
	
	
</div>


