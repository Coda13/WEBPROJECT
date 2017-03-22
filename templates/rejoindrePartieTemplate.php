<?php
	$login = User::get_login();
	
?>

<div id="contentUser">

	<h2>Choisis une partie, et let's go !</h2>
		
	<?php 
	//print_r($allParties) 
	
	
	for ($i=0;$i<sizeof($allParties);$i++){
		$id_partie = $allParties[$i]->ID_PARTIE;
		echo "<div id='cellule'><a href='index.php?action=viewCaracteristiquesPartie&idPartie=$id_partie'>".$id_partie."</a> créée par ".$allParties[$i]->LOGIN."</div>";
	}
	
	
	?>
	
	
</div>
