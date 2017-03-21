<?php
	class ViewRegles extends View{
		
 		public function render(){
			$this->templateNames['head'] = 'head2';
			$this->loadTemplate($this->templateNames['head'], $this->args); 
			$this->templateNames['menu'] = 'menu';
			$this->loadTemplate($this->templateNames['menu'], $this->args); 
			$this->templateNames['content'] = 'regles';
			$this->loadTemplate($this->templateNames['content'], $this->args); 
			$this->loadTemplate($this->templateNames['foot'], $this->args);
		}
		
	}