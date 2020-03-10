<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/vendor.php';
 
$database = new Database();
$db = $database->getConnection();
 
$vendor = new Vendor($db);
 
// set user property values
$vendor->mobile = $_POST['mobile'];
$vendor->password = ($_POST['password']);
$vendor->created = date('Y-m-d H:i:s');
 
// create the Vendor
if($vendor->signup()){
    $vendor_arr=array(
        "status" => 1,
        "message" => "Successfully Signup!",
        "id" => $vendor->id,
        "mobile" => $vendor->mobile
    );
}
else{
    $vendor_arr=array(
        "status" => 2,
        "message" => "Vendor already exists!"
    );
}
print_r(json_encode($vendor_arr));
?>