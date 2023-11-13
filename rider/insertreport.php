<?php
include 'database.php';
extract($_POST);

$sql = "INSERT INTO `commission`(`day`, `comm`) VALUES ('$day','$comm')";

$result = mysqli_query($conn,$sql) or die(mysqli_error());
if($result){
    echo "<script type = 'text/javascript'> window.location='calculation.php' </script>";
}
?>