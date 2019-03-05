<?php
session_start();

require_once("../../includes/functions.php");
$employee_id = $_SESSION['employee_id'];

if(isset($_POST['add_customer'])){
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_email = $_POST['customer_email'];
    $customer_contact = $_POST['customer_contact'];
    $gst_no = $_POST['gst_no'];
    
    $tableName = "customer";
    $columns = "customer_name, customer_address,  customer_email, customer_contact,  gst_no";
    $values = "'$customer_name', '$customer_address',  '$customer_email', $customer_contact,  '$gst_no'";
    
    insert($tableName, $columns, $values);
    echo "Inserted";
}else{
    echo "Some error occured";
}
