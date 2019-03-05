<?php
session_start();

require_once("../../includes/functions.php");
$employee_id = $_SESSION['employee_id'];

if(isset($_POST['add_supplier'])){
    $supplier_name = $_POST['supplier_name'];
    $supplier_address = $_POST['supplier_address'];
    $supplier_email = $_POST['supplier_email'];
    $supplier_contact = $_POST['supplier_contact'];
    $gst_no = $_POST['gst_no'];
    
    $tableName = "supplier";
    $columns = "supplier_name, supplier_address,  supplier_email, supplier_contact,  gst_no";
    $values = "'$supplier_name', '$supplier_address',  '$supplier_email', $supplier_contact,  '$gst_no'";
    
    insert($tableName, $columns, $values);
    $url = "http://localhost/erp/pages/add-supplier.php";
    redirect($url);
}else{
    echo "Some error occured";
}
