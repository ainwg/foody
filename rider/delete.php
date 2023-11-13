<?php
require('database.php');
$id=$_REQUEST['delivery_id'];
$query = "DELETE FROM delivery WHERE delivery_id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: DELIVER.php"); 
?>