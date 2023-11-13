<!-- insertDb.php -->
<!-- To insert data of createUser.php into database. -->
<?php

include("server.php");

//Dapatkan Tarikh Dan Masa Masuk
extract( $_POST );
$date = date("d-m-Y", time());
$time = date("H:i:s", time());
$query = "INSERT INTO userprofile (name,email,date,time,address,contactNum) VALUES('$name','$email','$date','$time','$address','$contactNum')";

if (mysqli_query($link, $query)) {
      
   echo "<script type='text/javascript'> window.location='ViewUser.php' </script>";
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($link);
}




?>