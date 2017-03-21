<?php
	$login = User::get_login();
?>

<div id="contentUser">

	<h2>Les règles du 6quiPrend</h2>
	
	<h1>But du jeu</h1>
	
	<p>Le but du jeu est de totaliser le moins de points possible à la fin de la partie. Pour cela, il ne faut pas ramasser de cartes Têtes de bœuf.<br/>
	Les cartes Têtes de bœuf sont numérotées de 1 à 104. Les cartes rapportent 1, 2, 3, 5 ou 7 points (en fonction du nombre de Têtes de bœuf présent) à celui qui les ramasse.</p>
	
	<h1>Déroulement d'une partie</h1>
	
	<p>Chaque joueur reçoit 10 cartes en début de manche. Ensuite 4 cartes sont placées sur la table pour former le début de 4 rangées.<br/>
	Chaque joueur choisit une carte de son jeu et la place face cachée sur la table. Quand tous les joueurs sont prêts, les cartes sont retournées face visible et sont jouées dans l'ordre croissant de leur valeur. Les cartes doivent être posées de manière à compléter les rangées en satisfaisant 3 critères :
	<li>la carte doit être jouée sur une rangée dont la valeur de la dernière carte est inférieure à celle de la carte jouée ;</li>
	<li>entre les rangées dont la dernière carte est inférieure à la carte jouée, il faut choisir celle où l'écart avec la carte jouée est le plus faible ;</li>
	<li>si la carte à jouer est de valeur inférieure à la dernière carte de toutes les rangées, le joueur choisit une rangée qu'il ramasse (généralement celle qui totalise le moins de têtes de bœuf) et pose sa carte comme première carte de la nouvelle rangée (il y a toujours exactement 4 rangées).
	</li></p>
	
	<div id="exemple">
	Exemple :<br/>
	Les 4 dernières cartes des rangées ont les valeurs suivantes : 8, 24, 69, 81 ; La carte à jouer est un 29.<br/>
	Elle ne peut être posée à la suite du 69 ou du 81 qui sont supérieurs à 29. Il faut donc poser le 29 soit après le 8, soit après le 24. 24 étant le nombre le plus proche de 29, la carte 29 sera donc posée après la carte 24.<br/>
	Si la carte à jouer avait été un 3 - donc une carte inférieure aux 4 cartes présentes - le joueur aurait dû ramasser la rangée de son choix (souvent celle qui possède le moins de têtes de bœuf) et la remplacer par sa carte 3.<br/>
	</div>
	
	<p>Les cartes de tous les joueurs sont jouées en respectant ces critères, dans l'ordre croissant des cartes jouées.<br/>
	Tant que les rangées comptent 5 cartes, rien ne se passe. Par contre, si un joueur ajoute une 6e carte à une rangée, il ramasse les 5 cartes présentes, les met de côté (elles seront comptabilisées à la fin de la partie) et place la sienne pour reformer une rangée (Attention, les cartes ramassées ne sont jamais remises dans sa main).<br/>
	À la fin du tour, tous les joueurs choisissent de nouveau une carte parmi celles qui leur restent et la partie continue jusqu'à ce que les 10 cartes soient jouées.</p>
		
	<h1>Fin de la partie</h1>
	<p>Les Têtes de bœuf présentes sur les cartes que chaque joueur a remportées au cours de la partie sont additionnées. Le résultat est noté sur une feuille de score puis une nouvelle manche commence.<br/>
	Le jeu s'arrête quand un joueur atteint 66 points cumulés sur toutes les manches précédentes. Est déclaré vainqueur celui qui totalise le moins de points.</p>

	</div>

