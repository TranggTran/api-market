<?php 
	class DBconnection{
		private $dbserver = "localhost";
		private $dbuser = "root";
		private $dbpass = "";
		private $dbname = "market";
		
		public $connection;
		
		// get the database connection 
		public function getConnection(){
			$this->connection = null;
			try{
				$this->connection = new PDO("mysql:host=" .$this->dbserver .";dbname=" .$this->dbname, $this->dbuser, $this->dbpass );
				$this->connection->exec("set names utf8");
				
				echo "Ket noi thanh cong";
			}catch(PDOException $exception){
				echo "Loi ket noi: " . $exception->getMessage() ."!"; 
			}
			return $this->connection;
		}
		
	}
?>