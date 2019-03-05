<?php
	require_once("../../includes/db.php");
	require_once("../../includes/functions.php");
	session_start();
	$employee_id = $_SESSION['employee_id'];
	
	if(isset($_POST['deleteBtn'])){
		$product_id = $_POST['product_id'];

		
		$tableName = "product";
		$primaryKeyColumnName = "product_id";
		
		deleteRecord($tableName,$primaryKeyColumnName,$product_id,$employee_id);
		
		$tableName = "product_sale_rate";
		deleteRecord($tableName,$primaryKeyColumnName,$product_id,$employee_id);
		
		
		
		//		$query = "UPDATE product,product_sale_rate SET product.deleted = 1,product.deleted_at = now(), product.deleted_by = $employee_id,product_sale_rate.deleted = 1,product_sale_rate.deleted_at = now(), product_sale_rate.deleted_by = $employee_id WHERE product.product_id = $product_id AND product.product_id = product_sale_rate.product_id";
//		
 	
	//$_SESSION['status'] = PRODUCT_DELETE_SUCCESS;
//		echo $_SESSION['status'];
    header("Location: http://localhost/erp/pages/manage-product.php");
    exit();
	}
?>