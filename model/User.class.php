<?php
	class User extends Model {
		
		public static function isLoginUsed($login){
			
			$myPDO = parent::db();
			$sql = "SELECT login FROM users WHERE login='$login'";
			
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
		
		public static function create($login,$password,$nom,$prenom,$mail){
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("INSERT INTO users (login,password,nom,prenom,mail) VALUES ('$login','$password','$nom','$prenom','$mail')");
			$stmt->execute();
		}
		
	
	
		/*******/
		
	public static function isPassword($login,$password){
		$myPDO = DatabasePDO::getCurrentObject();	
		$sql = "SELECT password FROM users WHERE login='$login'";	
		$stmt = $myPDO->prepare($sql); 
		$stmt->execute();
		
		$reponse = $myPDO->query($sql);
		$donnees = $stmt->fetch(PDO::FETCH_OBJ);
		
		if ($password==$donnees->password){
			$stmt->closeCursor();
			return true;
		}
		else{
			$stmt->closeCursor();
			return false;
		}
			
	}
}
		
		
		
	