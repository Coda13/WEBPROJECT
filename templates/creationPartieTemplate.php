<?php
	$login = User::get_login();
?>

<div id="contentUser">

	<h2>Nouvelle partie</h2>
	
	<center>
		<form action="index.php?action=creationPartie" method="post">
			<table>
				<tr>
					<th>Nom de la partie :</th>
					<td><input type="text" name="idPartie"/></td>
				</tr>
					<th />
					<td><input type="submit" value="Créer la partie" /></td>
				</tr>
			</table>
		</form>
				
	</center>
	
	
	
	
	
</div>
