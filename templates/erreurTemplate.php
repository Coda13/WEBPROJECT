<div class="error" id="content">
	<h2>Erreur</h2>
	
	<div id="error">
	
		<?php
			//$inscErrorText = $this->getArg('inscErrorText');
			if(isset($inscErrorText))
			echo '<span class="error">' . $inscErrorText . '</span>';
		?>		
	
	</div>
	
	<p>
		<a href="index.php?action=viewConnexion">Retour</a>
	</p>
	
</div>
