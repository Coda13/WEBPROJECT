<?php
	class Dispatcher extends MyObject {
		private static $myDispatcher = NULL;
		
		public static function dispatch($request){  //appelle une methode ayant le nom du controller et la requete
			if($request->getNameController() == NULL){ // cette fonction sert a ouvrir une session direct pour eviter de mettre le sliens dans les view apres et au moins on sait quel user on est 
				if(isset($_SESSION['login'])){
					$request->write('controller','User');
 				} else {
 					$request->write('controller','Anonymous');
 				}
			}
			return static::dispatchToController($request->getNameController(), $request); //a pour params une requete et le nom de son controller
		}
		
		//il faudrait verifier que le login est bien rmeplis et faire connexion pour eviter de metre le nom du user dans l'url et devenir connecter sans s'etre connecter
		
		public static function dispatchToController($controllerName, $request){
			$controllerClassName = ucfirst($controllerName).'Controller';  //monNomController
			if(!class_exists($controllerClassName)){
				throw new Exception ('Controller inconnu : '.ucfirst($controllerName));
			}
			//echo $controllerClassName;
			return new $controllerClassName($request);
		}
		
		
		
		public static function getCurrentDispatcher(){
			if (is_null(self::$myDispatcher)){
				try {
					$myDispatcher= new Dispatcher;
				} 
				catch (Exception $e ){
					die('Erreur de Dispatcher.\n');
				}
			}
			return $myDispatcher;
		}
	
	}
