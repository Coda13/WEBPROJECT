<?php
	require_once(__ROOT_DIR . '/classes/MyObject.class.php');
	
	class Request extends MyObject{
		
 	   public function __construct(){}
			
		private static $current;
			
		static function getCurrentRequest(){
			if(self::$current == null)
				$current = new Request();
			return $current;
		}
		
		static function getNameController(){
			if(!isset($_GET['controller']))
				return NULL;
			else 
				return ($_GET['controller']);
			//on regarde dans l'url pour recuper la requete et la clef de l user
		}
		
		
		static function getNameAction(){
			if(!isset($_GET['action']))
				return 'defaultAction';
			else
				return $_GET['action'];
		}
		
		public function read($text){
			//permet de lire les champs rentrés dans inscriptionTemplate
			if(isset($_POST[$text]))
				return $_POST[$text];
		}
		
		
		static function write($get, $valeur){	//permet de changer les champs de l'URL
			$_GET[$get]=$valeur;				
		}
	}
