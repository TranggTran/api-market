<?php 
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	include_once "../config.php";
	include_once "../entities/Products.php";
	
	$DBconn = new DBconnection;
	$connection = $DBconn->getConnection();
	
	//
	$product = new Products($connection);
	
	// query product
	$stmt = $product->getProducts();	
	$num = $stmt->rowCount();
	
	// 
	if($num > 0){
		
		// product array
		$product_arr = array();
		$products_arr["product"] = array();
		
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			
			
			$product_item = array(
				"status" => true,
				"message" => "Lay du lieu thanh cong",
				"id" => $row['id'],				
				"ten_hang" => $row['ten_hang'],
				"mo_ta" => $row['mo_ta'],
				"gia_ban" => $row['gia_ban'],
				"noi_dung" => $row['noi_dung'],
			);
			// add array
			array_push($products_arr["product"], $product_item);
		}
		
		// xuat file json
		echo json_encode($products_arr);
		
		/*$product_arr = array(
			"status" => true,
			"message" => "Lay du lieu thanh cong",
			"id" => $row['id'],
			"ten_hang" => $row['ten_hang'],
			"mo_ta" => $row['mo_ta'],
			"gia_ban" => $row['gia_ban'],
			"noi_dung" => $row['noi_dung'],
		);*/
		
		//$product_arr = array();
		
		//while($row = $num->fetch(PDO::FETCH_ASSOC)){
		//	$product_arr[] = $row;
		//}
	}else{
		$product_arr = array(
			"status" => false,
			"message" => "Loi lay du lieu!",
		);
	}
	
	
?>