<?php 
	class UserController extends Controller {
		
		public function __construct(){
			
			session_start();
			
			$request = Request::getCurrentRequest();
			parent::__construct($request);
			$_SESSION['login']=$request->read('user');
			//echo $request->read('user');
			
			
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
		
		
