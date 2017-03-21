<?php 
	class AnonymousController extends Controller {
		
		public function __construct(){
			$request = Request::getCurrentRequest();
			parent::__construct($request);
		}
		
		public function defaultAction($request){
			//$view = new ViewAnonymous($this,'accueil'); //pour commencer de l'acceuil
			$view = new ViewAnonymous($this);
			$view->render();
		}
		
/*******************************************************************************************************
		
		          Partie Inscription		
		
********************************************************************************************************/
				
		public function viewInscription($args){
			$view = new ViewInscription($this);//faire comme au dessus plutot 
			$view->render();
		}
		
		public function validateInscription($args){
			$login = $args->read('inscLogin');
			
			if(User::isLoginUsed($login)){
				
				//Si le login est deja utilisé, on renvoit un message d'erreur
				$view = new ViewErreurInscription($this);
				$view->setArg('inscErrorText',"Ce Login est déjà utilisé");
				$view->render();
			}
			
			else{
				
		   	 	$password = $args->read('inscPassword');
			 	$nom = $args->read('nom');
			 	$prenom = $args->read('prenom');
			 	$mail = $args->read('mail');
				
				if($login==NULL || $password==NULL || $prenom==NULL || $nom==NULL || $mail==NULL ){
					
					$view = new ViewErreurInscription($this);
					$view->setArg('inscErrorText',"Champs obligatoire non renseignés !");
					$view->render();
				}
				
				else {
				//$addr = $args->read('address'); par exemple, champs non obligatoire
					User::create($login,$password,$nom,$prenom,$mail);
					$view= new ViewConnexion($this);//a faire
					$view->render();
					
				}
			}
			
		}
		//include '../classes/Request.class.php';
		
		/*******/
		
		public function viewConnexion($args){
			$view = new ViewConnexion($this);
			$view->render();
		}
		
		public function validateConnexion($args){
			$log = $args->read('log');
			$pwd = $args->read('pwd');
			
			if(User::isLoginUsed($log)==false){
				$view = new ViewErreurInscription($this);
				$view->setArg('inscErrorText',"Ce login est inconnu");
				$view->render();
			}
			else{
				if(User::isPassword($log,$pwd)==false){
					$view = new ViewErreurInscription($this);
					$view->setArg('inscErrorText',"Le mot de passe ne correspond pas au login.");
					$view->render();
				}
				else{
					
   				 	$newRequest = new Request();
   				 	$newRequest->write('controller','user');
					$newRequest->write('action','defaultAction');
				 	$newRequest->write('user',$log);
					//echo 'Mon login = '.$log;
					$_SESSION['login']=$log;
					print_r($_SESSION);
					//echo 'User : '.$newRequest->read('user');
    				$controller = Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
					try {
						// Execute the requested action
						$controller->execute();
					} catch (Exception $e) {
						echo 'Error : ' . $e->getMessage() . "\n";
					}
					
				}
				
			}			
				
		}
	}
