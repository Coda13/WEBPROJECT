<?php
	$login = User::get_login();
	
?>

<div id="contentUser">

	<h2>Choisis une partie, et let's go !</h2>
		
	<?php 
	//print_r($allParties) 
	
	for ($i=0;$i<sizeof($allParties);$i++){
		echo "<div id='cellule'>".$allParties[$i]->ID_PARTIE." créée par ".$allParties[$i]->LOGIN."</div>";
	}
	
	
	?>
	
	
</div>
