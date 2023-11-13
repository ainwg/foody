<?php

//make connection
$conn = mysqli_connect("localhost","root","","foody");

//check connection
if(!$conn){
    die('Connection Failed'. mysqli_connect_error());
}

?>
