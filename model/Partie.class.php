<?php
	class Partie extends Model {
		
		public static function exists($id){
			
			$myPDO = parent::db();
			$sql = "SELECT ID_PARTIE FROM partie WHERE ID_PARTIE=$id";
			
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
	}