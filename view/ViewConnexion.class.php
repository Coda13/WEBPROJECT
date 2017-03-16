<?php
	class ViewConnexion extends View{
		
 		public function render(){
			$this->loadTemplate($this->templateNames['head'], $this->args); 
			$this->templateNames['content'] = 'connexion';
			$this->loadTemplate($this->templateNames['content'], $this->args); 
			$this->loadTemplate($this->templateNames['foot'], $this->args);
		}
		
	}