<?php 
	Class DatabasePDO extends PDO{
		private static $inst;

		public function __construct(){
			
		}

		public static function singleton(){

		$mysql_dbname = "six_qui_ramasse";
		$mysql_user = "root";
		$mysql_password = "root";
		
		$dsn = "mysql:host=localhost;dbname=$mysql_dbname";
		$user = $mysql_user;
		$password = $mysql_password;
        	static $inst = null;
			error_reporting(E_ALL);
        	$verbose = true;
        	if ($inst === null) {
        	   try {
				$inst = new PDO($dsn,$user,$password);
				$inst->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch (PDOException $erreur) {
					if ($verbose)
						echo 'Erreur : '.$erreur->getMessage();
					else
						echo 'Connexion à la BDD impossible';
				}
        	}
    		return $inst;
    }
	}
?>