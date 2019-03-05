<?php

require_once("../../includes/functions.php");
session_start();
if(isset($_POST['edit_product'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
	$eoq = $_POST['eoq'];
	$additional_specification = $_POST['additional_specification'];
	$supplier_name = $_POST['supplier_name'];
	$category_name = $_POST['category_name'];
    
    $employee_id = $_SESSION['employee_id'];
    
    $query = "UPDATE product SET product_name = '$product_name', product_address = '$product_address', product_email = '$product_email',product_contact ='$product_contact',gst_no = '$gst_no' , updated_by = $employee_id, updated_at = now() WHERE product_id = $product_id";
    
    $result = mysqli_query($connection, $query);
    checkQueryResult($result);
    
    $_SESSION['status'] = PRODUCT_EDIT_SUCCESS;
    header("Location: http://localhost/inventory/pages/manage-product.php");
    exit();
}
?>