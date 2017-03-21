<?php
	$login = User::get_login();
?>

		<div id="content">
	
		<h2>Inscription</h2>


		<center>
		<form action="index.php?action=validateModificationProfil" method="post">
			<table>
				<tr>
					<th>Mail :</th>
					<td><input type="text" name="modifMail" /></td>
				</tr>
				<tr>
					<th>Nom :</th>
					<td><input type="text" name="modifNom" ></td>
				</tr>
				<tr>
					<th>Prénom :</th>
					<td><input type="text" name="modifPrenom" /></td>
				</tr>
				<tr>
					<th />
					<td><input type="submit" value="modifierProfil" /></td>
				</tr>
			</table>
		</form>
		
		<p>/!\ Tous les champs sont obligatoires</p>
		
		</center>
		
		
		</div>
	
