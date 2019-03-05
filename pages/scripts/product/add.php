<?php
session_start();
$employee_id = $_SESSION['employee_id'];
require_once("../../includes/functions.php");

/*echo "Image Name : ".$image_name;
echo "<br> Temp Name : ".$temp_name;
echo "<br> File Type : ".$file_type;
echo "<br> File Extension: ".$file_extension;

$valid_extensions = array("jpeg","jpg","png");

if(in_array($file_extension, $valid_extensions) == false){
    $error_msg[] = "Iamge is not valid! Please choose a JPEG or PNG File!";
}
if(empty($error_msg)){
    move_uploaded_file($temp_name, "../../../assets/products/images/".$image_name);
    echo "File Successfully Uploaded!";
}else{
    print_r($error_msg);
}*/
if(isset($_POST['add_product'])){
    // checking whether the file was uploaded or not!
    if(isset($_FILES['product_image'])){
        //yes the file was supported so we are intializing all required variables
        $image_name = $_FILES['product_image']['name'];
$image_size = $_FILES['product_image']['size'];
$temp_name = $_FILES['product_image']['tmp_name'];
$file_type = $_FILES['product_image']['type'];

$file_extension = strtolower(end(explode(".", $image_name)));
    }
    $product_name = $_POST['product_name'];
    $additional_specification = $_POST['additional_specification'];
    $rate_of_sale = $_POST['rate_of_sale'];
    $category_id = $_POST['category_id'];
    $eoq = $_POST['eoq'];
    $suppliers = $_POST['supplier_id'];
    
   $tableName = "product";
    $columns = "product_name, eoq,additional_specification, category_id, image_extension, created_by";
    $values = "'$product_name',$eoq, '$additional_specification','$category_id','$file_extension',$employee_id";
    
    $result = insert($tableName, $columns, $values);
    //product has been added
    $product_id = mysqli_insert_id($connection);
    
    $tableName = "product_sale_rate";
 $columns = "product_id, rate_of_sale, wef, created_by";
    $values = "$product_id, $rate_of_sale, now(), $employee_id";
    $result = insert($tableName, $columns, $values);
    
    $tableName = "product_supplier";
    $columns = "product_id, supplier_id";
    foreach($suppliers as $supplier_id){
        $values = "$product_id, $supplier_id";
        $result = insert($tableName, $columns, $values);
            
    }
    /*Code to upload the file */
    if(isset($_FILES['product_image'])){
        move_uploaded_file($temp_name,"../../../assets/products/images/".$product_id.".".$file_extension);
    }
    echo "ADDED";
   //$_SESSION['status'] = CUSTOMER_ADD_SUCCESS;
        
}
?>