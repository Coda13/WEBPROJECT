<?php 
	class UserController extends Controller {
		
		public function __construct(){
			
			//session_start();//fait dans l'index
			
			$request = Request::getCurrentRequest();
			parent::__construct($request);
			//$_SESSION['login']=$request->read('user');//fait dans le anonymous
			//echo $request->read('user');
			
			
		}
		
		public static function deconnexion(){
			session_destroy();
			$newRequest = new Request();
			$newRequest->write('controller','anonymous');
			$newRequest->write('action','defaultAction');
			$controller = Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
			$controller->execute();
			$view = new ViewAnonymous($this);
			$view->render();
		}
		
		
		
		public function defaultAction($r) {
			$view= new ViewUserAccueil($this);
			$view->render();
		}
				
		public function viewProfil($args){
			$view = new ViewProfil($this);
			$view->render();
		}
		
		public function viewRegles($args){
			$view = new ViewRegles($this);
			$view->render();
		}
		
		public function viewCreationPartie($args){
			$view = new ViewCreationPartie($this);
			$view->render();
		}
		
		public function viewRejoindrePartie($args){
			$view = new ViewRejoindrePartie($this);
			$view->render();
		}
		
		
		
	/************************************************************************************************************************************************************
	
	Gestion du Profil 
	
	******************************************************************************************************/
	
	
	
	public function modifierProfil(){
		$view= new ViewUserModifierProfil($this);
		$view-> render();
	}
	
	
	public function validateModificationProfil($args){
		$id = User::get_login();
		
		$mail = $args->read('modifMail');
		if($mail!=NULL)
			User::setMail($mail,$id);
         $nom = $args->read('modifNom');
		if($nom!=NULL)
			User::setNom($nom,$id);
		$prenom = $args->read('modifPrenom'); 
		if($prenom!=NULL)
			User::setPrenom($prenom,$id);
		
        $view = new ViewProfil($this);
        $view->render();
	}
}
		
		

	}
		
		
