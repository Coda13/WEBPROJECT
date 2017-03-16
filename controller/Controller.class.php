<?php
//si on veut faire une nouvelle action, on oeut faire une nouvelle methode dans la calss qu'il faut. PAr exemple si on veut creer un compte, on va creer une nouvelle methode dans anonymous controller


abstract class Controller extends MyObject{
	
	private $myRequest;
	// private $methodeName;
	
	function __construct($request){
		$this->myRequest = $request;
	}
	
	public abstract function defaultAction($args);
	
	function execute(){
		$methodeName = $this->myRequest->getNameAction();
		$this->$methodeName($this->myRequest);	
	}
}
