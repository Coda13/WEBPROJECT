<?php
	$login = User::get_login();
	
	function listePartie($login){
		
		$array= Partie::getIdPartie($login);
		$count = sizeof($array);
			
		for($i=0;$i<$count;$i++){	
			
			echo $login." a crée : ".$array[$i]; //faire les liens pour cliquer vers la partie
			
		}
	}
?>
<div id="contentUser">

	<h2>Choisis une partie, et let's go !</h2>
		<?php listePartie($login)?>
	
	
</div>
