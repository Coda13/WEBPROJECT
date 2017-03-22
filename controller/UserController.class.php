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
	
	/***********************************************************************************************************
	
	Gestion d'une partie 
	
	***********************************************************************************************************/
	
	public function creationPartie($args){
		$log = User::get_login();
		
		$id_partie = $args->read('idPartie');
		if(Partie::exists($id_partie)){
			$view = new ViewErreurInscription($this);
			$view->setArg('inscErrorText',"Une partie de même nom existe déjà.");
			$view->render();
		}
		else{
			Partie::create($id_partie,$log);
			$view= new ViewInvitation($this);
			$view->render();
		}
	}
	
	public function rejoindreLaPartie($idPartie,$login){
		$myPDO = parent::db();
		$stmt = $myPDO->prepare("INSERT INTO rejoindre (LOGIN,ID_PARTIE,SCORE) VALUES ('$login','$idPartie',0)");
		$stmt->execute();
		
	}
}
