<?php 
	
	
	class Products{
		// connection 
		private $conn;
		
		// table name
		private $table_name = "products";
		
		// table columns
		private $id;
		private $ten_hang;
		private $mo_ta;
		private $gia_ban;
		private $noi_dung;
		
		// ham tao
		public function __construct($db){
			$this->conn = $db;
		}
		
		public function create(){
			
		}
		
		// read
		public function getProducts(){
			// select all query
			$query = "SELECT * FROM products";
			
			$stmt = $this->conn->prepare($query);
			
			$stmt->execute();
			
			return $stmt;
		}
	}
?>