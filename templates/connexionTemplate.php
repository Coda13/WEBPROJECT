<?php
	if(isset($inscErrorText))
	echo '<span class="error">' . $inscErrorText . '</span>';
?>

	
	
		<div id="content">
	
		<h2>Connexion</h2>


		<center>
		<form action="index.php?action=validateConnexion" method="post">
			<table>
				<tr>
					<th>Login :</th>
					<td><input type="text" name="log"/></td>
				</tr>
				<tr>
					<th>Mot de passe :</th>
					<td><input type="password" name="pwd"/></td>
				</tr>
				<tr>
					<th />
					<td><input type="submit" value="Valider" /></td>
				</tr>
			</table>
		</form>
		<p> Mot de passe oublié ? </p>
		<p>Tu ne possèdes pas de compte ? Inscris-toi <a href="index.php?action=viewInscription">ici</a> !
		
		
		
		</center>
		
		
		</div>