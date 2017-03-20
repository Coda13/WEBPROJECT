<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>6QuiPrend</title>
		<link	rel="stylesheet"	href="css/style.css"	type="text/css"	media="screen"	title="style"	charset="utf-8"	/>
		<link rel="shortcut icon" href="../images/logo.jpg"/>	
	</head>
	<body>
		<div id="header">
			<div id="blocks">
				<div id="icon">
					<a href="index.php?action=defaultAction"><img src="../images/Logo2.png" alt="Logo2" style="width:100px;height:100px;"></a>
				</div>
				
				<?php
					$login = User::get_login();
				?>
				
				<div id="block3">
					<div id="avatar">
						<img src="../images/anonymous.png" alt="anonymous" style="width:80px;height:80px;">
					</div>
						
					
					<p>User : <?php echo User::getPrenom($login) ?><br />
					Statut : Connecté<br/>
					<a href="index.php?action=viewProfil">Voir profil</a></p>
					
					
					<div id="deconnexion">
						<a href="index.php?action=deconnexion"><img src="../images/logout.png" alt="logout" style="width:50px;height:50px;"></a>
					</div>
				</div>
			</div>
			
		</div>
