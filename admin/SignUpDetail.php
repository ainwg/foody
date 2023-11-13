<?php
include('server.php');
if (isset($_POST['reg_user'])){
$username = $_POST['username'];
$password = $_POST['password_1'];
$email = $_POST['email'];
$userType = $_POST['userType'];

$sql = "INSERT INTO `user`(`user_ID`, `username`, `password`, `email`, `userType`) VALUES ('[value-1]','$username','$password','$email','$userType');";
mysqli_query($link, $sql)
}
?>