<?php 
	Class User extends Model{
		private $login;
		private $password;

		public function __construct($login, $password){
			$this->login=$login;
			$this->password=$password;
		} 

		public function getLogin(){
			return $this->login;
		}

		public function getPassword(){
			return $this->password;
		}

		public static function isLoginUsed($log){
			$isUsed = FALSE;
			$query = 'SELECT login FROM joueur WHERE login=\''.$log.'\'';
			$st = static::db()->query($query) or die("sql query error ! request : " . $query);
			$login = $st->fetch(PDO::FETCH_LAZY);
			if($login != NULL){
				$isUsed = TRUE;
			}
			echo $isUsed;
			return $isUsed;
		}

		public static function create($login, $password){
			$query = 'INSERT INTO joueur (login,password) VALUES (\''.$login.'\',\''.$password.'\')';
			$st = static::db()->query($query) or die("sql query error ! request : " . $query);
			$user = new User($login, $password);
			return $user;
		}

		public function toHTML(){
			echo "<ul><li> Name : ".$this->login."</li></ul>";
		}
	}
	?>