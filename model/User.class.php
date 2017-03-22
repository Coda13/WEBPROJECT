<?php
	class User extends Model {
		
		public static function isLoginUsed($login){
			
			$myPDO = parent::db();
			$sql = "SELECT LOGIN FROM users WHERE LOGIN='$login'";
			
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
			$stmt = $myPDO->prepare("INSERT INTO users (LOGIN,PASSWORD,MAIL,NOM,PRENOM) VALUES ('$login','$password','$mail','$nom','$prenom')");
			$stmt->execute();
		}
		
	
		
		public static function isPassword($login,$password){
			$myPDO = DatabasePDO::getCurrentObject();	
			$sql = "SELECT PASSWORD FROM users WHERE LOGIN='$login'";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
		
			$reponse = $myPDO->query($sql);
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);
		
			if ($password==$donnees->PASSWORD){
				$stmt->closeCursor();
				return true;
			}
			else{
				$stmt->closeCursor();
				return false;
			}
			
		}
		
		
		public static function getTableauUsers() {
		//interroge la base de donnée pour savoir si un login est utilisé ou non
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT LOGIN FROM users ";	//récupère tous les logins 
				
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
		
			$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			$array = array();
		
			while(!empty($donnees)) {	
				$array[] = $donnees->LOGIN;
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			}

			$stmt->closeCursor();		
			return $array;
	
		}
	
	
		
		
/***************************************************************************************************************************

						Partie Accesseur

******************************************************************************************************/

		
	
		
		/*public static function getLogin($login){
			$myPDO = DatabasePDO::getCurrentObject();	
			$sql = "SELECT login FROM users WHERE login='$login'";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
		
			$reponse = $myPDO->query($sql);
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			$log = $donnees->login;
			$stmt->closeCursor();
			return $log;
		}*/
		
		
		
		public static function get_login(){	//permet de récupérer le login de l'users depuis le get
			if(isset($_SESSION['login'])){
				$login=$_SESSION['login'];
					return $login;
			}
			else
				return 'anonymous';
		}
		
		
		
		public static function getMail($login){	//permet de récupérer le mail de l'users
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT MAIL FROM users WHERE LOGIN='$login'";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
			$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			$mail=$donnees->MAIL;
			$stmt->closeCursor();
			
			return $mail;
		}
		
		public static function setMail($mail,$id){	//a partir de mtn, dans l'url on va avoir iduser
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE users SET MAIL='$mail' WHERE LOGIN='$id'";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 

			$stmt->execute();
		}
		
		public static function getMdp($mail){	//pour la récupération du mdp oublié
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT PASSWORD FROM users WHERE MAIL='$mail'";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
	
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			$mdp=$donnees->PASSWORD;
			$stmt->closeCursor();
			
			return $mdp;
		}
		
		public static function setMdp($mdp,$id){	//a partir de mtn, dans l'url on va avoir iduser
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE users SET PASSWORD='$mdp' WHERE LOGIN='$id'";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 

	
			$stmt->execute();
		}
		
		public static function setPrenom($prenom,$id){	
			$myPDO = parent::db();	
			$sql = "UPDATE users SET PRENOM='$prenom' WHERE LOGIN='$id'";	
			$stmt = $myPDO->prepare($sql); 

			$stmt->execute();
		}
		
		public static function getPrenom($id){
			$myPDO = parent::db();
			$sql = "SELECT PRENOM FROM users WHERE LOGIN='$id'";
			$stmt = $myPDO->prepare($sql); 

			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			$prenom=$donnees->PRENOM;
			$stmt->closeCursor();
		
			return $prenom;
		}
		
		public static function setNom($nom,$id){	
			$myPDO = parent::db();
			$sql = "UPDATE users SET NOM='$nom' WHERE LOGIN='$id'";		
			$stmt = $myPDO->prepare($sql); 
	
		
			$stmt->execute();
		}
		
		public static function getNom($id){
			$myPDO = parent::db();	
			$sql = "SELECT NOM FROM users WHERE LOGIN='$id'";		
			$stmt = $myPDO->prepare($sql); 

			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$nom=$donnees->NOM;
			$stmt->closeCursor();
		
			return $nom;
		}
		
	
}

?>
		
		
		
	
