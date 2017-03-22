<?php
	class ViewInvitation extends View{
		
 		public function render(){
			$this->templateNames['head2'] = 'head2';
			$this->loadTemplate($this->templateNames['head2'], $this->args); 
			$this->templateNames['menu'] = 'menu';
			$this->loadTemplate($this->templateNames['menu'], $this->args); 
			$this->templateNames['content'] = 'invitation';
			$this->loadTemplate($this->templateNames['content'], $this->args);
			$this->loadTemplate($this->templateNames['foot'], $this->args); 
		}
		
	}