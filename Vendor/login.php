<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/vendor.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare vendor object
$vendor = new Vendor($db);
// set ID property of vendor to be edited
$vendor->mobile = isset($_POST['mobile']) ? $_POST['mobile'] : die();
$vendor->password = (isset($_POST['password']) ? $_POST['password'] : die());
// read the details of vendor to be edited
$stmt = $vendor->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $vendor_arr=array(
        "status" => 1,
        "message" => "Successfully Login!",
        "id" => $row['id'],
        "mobile" => $row['mobile']
    );
}
else{
    $vendor_arr=array(
        "status" => 2,
        "message" => "Invalid Mobile Number or Password!",
    );
}
// make it json format
print_r(json_encode($vendor_arr));
if($stmt->rowCount() > 0){
    ?>
    <br><br><a href="list.php">Click to see list of items</a>
    <?php
}
?>