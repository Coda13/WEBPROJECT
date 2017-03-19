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
		
		
		
/***************************************************************************************************************************

						Partie Accesseur

******************************************************************************************************/

		
		public static function getLogin($loginl){	//permet de récupérer le login de l'users
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT login FROM users WHERE login='$login'";	//récupère le login de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			$id=$donnees->login;
			$stmt->closeCursor();
			
			return $id;
		}
		
		
		
		public static function get_login(){	//permet de récupérer le login de l'users depuis le get
			if(isset($_GET['login'])){
				$id=$_GET['login'];
					return $id;
			}
			else
				return 'anonymous';
		}
		
		
		public static function get_Mail(){	//permet de récupérer le mail de l'users depuis le get
			if(isset($_GET['mail'])){
				$mail=$_GET['mail'];
					return $mail;
			}
			else
				return 'anonymous';
		}
		
		public static function getMail($login){	//permet de récupérer le mail de l'users
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT mail FROM users WHERE login='$login'";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
			$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			$mail=$donnees->mail;
			$stmt->closeCursor();
			
			return $mail;
		}
		
		public static function setMail($mail,$id){	//a partir de mtn, dans l'url on va avoir iduser
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE users SET mail=$mail WHERE login=$id";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 

			$stmt->execute();
		}
		
		public static function getMdp($mail){	//pour la récupération du mdp oublié
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT password FROM users WHERE MAIL=$mail";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
	
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			$mdp=$donnees->MOT_DE_PASSE;
			$stmt->closeCursor();
			
			return $mdp;
		}
		
		public static function setMdp($mdp,$id){	//a partir de mtn, dans l'url on va avoir iduser
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE users SET password=$mdp WHERE login=$id";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 

	
			$stmt->execute();
		}
		
		public static function setPrenom($prenom,$id){	
			$myPDO = parent::db();	
			$sql = "UPDATE users SET prenom=$prenom WHERE login=$id";	
			$stmt = $myPDO->prepare($sql); 

			$stmt->execute();
		}
		
		public static function getPrenom($id){
			$myPDO = parent::db();
			$sql = "SELECT PRENOM FROM users WHERE login=$id";
			$stmt = $myPDO->prepare($sql); 

			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			$prenom=$donnees->prenom;
			$stmt->closeCursor();
		
			return $prenom;
		}
		
		public static function setNom($nom,$id){	
			$myPDO = parent::db();
			$sql = "UPDATE users SET NOM=$nom WHERE login=$id";		
			$stmt = $myPDO->prepare($sql); 
	
		
			$stmt->execute();
		}
		
		public static function getNom($id){
			$myPDO = parent::db();	
			$sql = "SELECT NOM FROM users WHERE login=$id";		
			$stmt = $myPDO->prepare($sql); 

			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$nom=$donnees->nom;
			$stmt->closeCursor();
		
			return $nom;
		}
		
	
}

?>
		
		
		
	
