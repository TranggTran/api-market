<?php 
	header("Content-Type: application/json; charset=UTF-8");
	
	include_once "../config.php";
	include_once "../entities/Products.php";
	
	$DBconn = new DBconnection;
	$connection = $DBconn->getConnection();
	
	$product = new Products($connection);
	

	// 
	if($count > 0){
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$product_arr = array(
			"status" => true,
			"message" => "Lay du lieu thanh cong",
			"id" => $row['id'],
			"ten_hang" => $row['ten_hang'],
			"mo_ta" => $row['mo_ta'],
			"gia_ban" => $row['gia_ban'],
			"noi_dung" => $row['noi_dung'],
		);
	}else{
		$product_arr = array(
			"status" => false,
			"message" => "Loi lay du lieu!",
		);
	}
	
	// xuat file json
	print_r(json_encode($product_arr));
?>