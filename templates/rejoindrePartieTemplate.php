<?php
	$login = User::get_login();
	
	function listePartie($login){
		
		
		$arrayUsers=User::getTableauUsers();
		
		
		$countUsers = sizeof($arrayUsers);
		
		for($j=0;$j<$countUsers;$j++){
			
				$arrayParties= Partie::getIdPartie($arrayUsers[$j]);
				$countParties= sizeof($arrayParties);
				for($i=0;$i<$countParties;$i++){
			
				echo "<br>".$arrayUsers[$j]." a crée : ".$arrayParties[$i] ; //faire les liens pour cliquer vers la partie
			}
		}
	}
?>
<div id="contentUser">

	<h2>Choisis une partie, et let's go !</h2>
		<?php listePartie($login)?>
	
	
</div>
