<?php
	class Model extends MyObject{
	
	
		protected static function db(){
			return DatabasePDO::getCurrentObject();
		}
	}	
?>