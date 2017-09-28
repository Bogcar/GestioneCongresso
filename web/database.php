<?php
class Database { 
	
	private static $hostname = 'efof.myd.infomaniak.com';
	private static $user = 'efof_fsy_user';
	private static $password = 'Fsy_Db_Admin';
	
	private static $DB_name = 'efof_fsy';

	private static $_connection=NULL; 
	
	public static function getConnection() {
		
		if(is_null(self::$_connection)) 
		{		
			self::$_connection= new mysqli(self::$hostname,self::$user,self::$password,self::$DB_name);
			
			if(self::$_connection->connect_error)
			{
				die('Errore:'.self::$_connection->connect_error);
			}
			
			Return self::$_connection;
		}
	}

	private function __construct() {
		
	}
}
?>