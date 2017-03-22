<?php
	class Partie extends Model {
		
		public static function exists($id){
			
			$myPDO = parent::db();
			$sql = "SELECT ID_PARTIE FROM partie WHERE ID_PARTIE='$id'";
			
			$stmt = $myPDO->prepare($sql); 
			
			$stmt->execute();
			
			$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt -> fetch(PDO::FETCH_OBJ);//Resultats stockés dans $données
			
			if(!empty($donnees)){
				$stmt->closeCursor();//Termine le traitement de la requête
				return true;
			}
			
			else{
				$stmt->closeCursor();
				return false;
			}
		}
		
		public static function create($id,$login){
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("INSERT INTO partie (ETAT,NB_JOUEURS,ID_PARTIE,LOGIN) VALUES ('EnCours',1,'$id','$login')");
			$stmt->execute();
		}
		
		
		
		/*****************************************************************************************************************
		
		Partie Accesseurs
		
********************************************************************************************************/
		
		
		public static function getIdPartie($idp) {//permet de recuperer l'id de la partie 	
				
			$myPDO = parent::db();	
			$sql = "SELECT ID_PARTIE FROM PARTIE WHERE LOGIN='$idp'";	
			
				
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			
			
			$array = array();
			
			while(!empty($donnees)) {	
				$array[] = $donnees->ID_PARTIE;
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			}

			$stmt->closeCursor();		
			return $array;
		}
		
		
	 	public  static function listePartie($login){
		
		
		$arrayUsers=User::getTableauUsers();
		
		
		$countUsers = sizeof($arrayUsers);
		
		for($j=0;$j<$countUsers;$j++){
			
				$arrayParties= Partie::getIdPartie($arrayUsers[$j]);
				$countParties= sizeof($arrayParties);
				for($i=0;$i<$countParties;$i++){
			
				echo "<br>".$arrayUsers[$j]." a crée : ".$arrayParties[$i] ; //faire les liens pour cliquer vers la partie
			}
		}
	}
		
		
		
}
