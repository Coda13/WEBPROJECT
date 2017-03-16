<?php
	class DatabasePDO extends PDO {
		private static $myPDO = NULL;

	
	public static function getCurrentObject(){
		if (is_null(self::$myPDO)){		//Si on a pas de objet sql
			try{ 
				$dsn = "mysql:host=localhost;dbname=test";
				$user = 'root';
				$password = 'root';
				self::$myPDO = new PDO($dsn,$user,$password);
			} 
			catch(Exception $e){ 
				die('Error while connecting to MySQL.');
			}
		}
		return self::$myPDO;
	}
}
?>