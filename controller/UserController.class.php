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
	}
		
		
