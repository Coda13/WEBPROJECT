<?php
	 abstract class View extends myObject {
		
		protected $args;
		protected $templateNames;
		
		public function __construct($controller,$args = array()) {
			//parent::__construct();
			$this->templateNames = array();
			$this->templateNames['head'] = 'head';
			//$this->templateNames['top'] = 'top';
			//$this->templateNames['menu'] = 'menu';
			$this->templateNames['foot'] = 'foot';
			//$this->templateNames['content'] = $templateName; //prend inscription dans anonymous
			//$this->args = $args;
			$this->args['controller'] = $controller;
		}
		
		
		public function setArg($key, $val) {
			$this->args[$key] = $val;
		 }
		
		public function loadTemplate($name,$args=NULL) {
			$templateFileName = __ROOT_DIR . '/templates/'. $name . 'Template.php';
			if(is_readable($templateFileName)) {
				if(isset($args))
					foreach($args as $key => $value)
						$$key = $value;
				require_once($templateFileName);
			}
			else
				throw new Exception('undefined template "' . $name .'"');
		}
		
		public abstract function render();
		
	}