<?php
	if(isset($inscErrorText))
	echo '<span class="error">' . $inscErrorText . '</span>';
?>

	
	
		<div id="content">
	
		<h2>Inscription</h2>


		<center>
		<form action="index.php?action=validateInscription" method="post">
			<table>
				<tr>
					<th>Login :</th>
					<td><input type="text" name="inscLogin"/></td>
				</tr>
				<tr>
					<th>Mot de passe :</th>
					<td><input type="password" name="inscPassword"/></td>
				</tr>
				<tr>
					<th>Mail :</th>
					<td><input type="text" name="mail"/></td>
				</tr>
				<tr>
					<th>Nom :</th>
					<td><input type="text" name="nom"/></td>
				</tr>
				<tr>
					<th>Prénom :</th>
					<td><input type="text" name="prenom"/></td>
				</tr>
				<tr>
					<th />
					<td><input type="submit" value="Créer mon compte" /></td>
				</tr>
			</table>
		</form>
		
		<p>/!\ Tous les champs sont obligatoires</p>
		
		</center>
		
		
		</div>
	