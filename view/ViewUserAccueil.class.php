<?php
	class ViewUserAccueil extends View{
		
 		public function render(){
			$this->templateNames['head'] = 'head2';
			$this->loadTemplate($this->templateNames['head'], $this->args); 
			$this->templateNames['content'] = 'userAccueil';
			$this->loadTemplate($this->templateNames['content'], $this->args); 
			$this->loadTemplate($this->templateNames['foot'], $this->args);
		}
		
	}
