<?php
	$login = User::get_login();
?>

<div id="contentUser">

	<h2>Salut <?php echo User::getPrenom($login) ?> !</h2>
	
	<p>Tu as envie de rejoindre une partie? Consulte les parties en cours !</p>
	
	<p><a href="index.php?controller=user&action=viewProfil">Consulte ton profil !</a></p>
	
	<div id="contenuAccueil">
		
	</div>
</div>


