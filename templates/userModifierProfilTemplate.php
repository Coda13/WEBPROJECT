<?php
	$login = User::get_login();
?>

		<div id="content">
	
		<h2>Modifier le profil</h2>


		<center>
		<form action="index.php?action=validateModificationProfil" method="post">
			<table>
				<tr>
					<div id="celluleTitre"><h1>Tes infos</h1> </div>
					<div id="cellule">NOM : <input type="text" name="modifNom" ></div> 
					<div id="cellule">PRENOM : <input type="text" name="modifPrenom" /></div>
					<div id="cellule">MAIL : <input type="text" name="modifMail" /> </div>
				</tr>
				<tr>
					<th />
					<td><input type="submit" value="Valider les modifications" /></td>
				</tr>
			</table>
		</form>
		
		</center>
		
		
		
		</div>
