<?php

require_once("../../includes/functions.php");
session_start();
if(isset($_POST['edit_customer'])){
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_email = $_POST['customer_email'];
    $customer_contact = $_POST['customer_contact'];
    
    $employee_id = $_SESSION['employee_id'];
    
    $query = "UPDATE customer SET customer_name = '$customer_name', customer_address = '$customer_address', customer_email = '$customer_email', customer_contact='$customer_contact' ,updated_by = $employee_id, updated_at = now() WHERE customer_id = $customer_id";
    
    $result = mysqli_query($connection, $query);
    checkQueryResult($result);
    
    $_SESSION['status'] = CUSTOMER_EDIT_SUCCESS;
    header("Location: http://localhost/erp/pages/manage-customer.php");
    exit();
}
?>