<?php 
	//load my root class
	require_once(__ROOT_DIR.'/classes/MyObject.class.php');
	
	class AutoLoader extends MyObject{
		
		public function __construct(){
			spl_autoload_register(array($this,'load')); //Quand le nom n'est pas compris, il fait load(nom)
		}
		
		// This method will be automatically executed by PHP whenever it encounters
		// an unknown class name in the source code
		
		private function load($className) {//Load la classe si elle n'est pas chargée
			//$this->log(__CLASS__ .'load:'.$className);
			
			$chemin = array('/model/','/classes/','/controller/','/view/');
			$nom = null;
			$i = 0;
			
			do{			//plus efficace que le foreach
				$nom = __ROOT_DIR . $chemin[$i].ucfirst($className).'.class.php';
				$i++;
			}
			while(!is_readable($nom)&&($i<count($chemin)));
			if (!is_readable($nom)) {
				throw new Exception("Classe inconnue: ".ucfirst($className));
			}
			
			//echo "<p>Loading: $nom</p>"; //pour voir quels fichiers sont chargés
			require_once($nom);
			
			//code pas sur
			/*if(strlen(strstr($nom, '/model/'))>0){
				//on load une class model --> essai des requetes sql
				/*$sqlNom = __ROOT_DIR . '/sql/'.ucfirst($className).'.sql.php';
				if (is_readable($sqlNom)){
					require_once($sqlNom);
					$this->log(__CLASS__.'load:'.ucfirst($className).'.sql.php'); 
				}*/
			
		}	
	} 
	$__LOADER = new AutoLoader(); 	
