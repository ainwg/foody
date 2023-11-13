<?php
include 'database.php';
extract($_POST);
$id = $_GET['delivery_id'];

$sql = "UPDATE `delivery` SET `riderid`='$riderid',`orderlistid`='$orderlistid',`delivery_location`='$delivery_location', `delivery_status`='$delivery_status' WHERE `delivery_id`='$id'";

$result = mysqli_query($conn,$sql) or die(mysqli_error());
if($result){
    echo "<script type = 'text/javascript'> window.location='DELIVER.php' </script>";
}
?>