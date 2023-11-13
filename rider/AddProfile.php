<?php
include("database.php");
extract($_POST);

$query = "INSERT INTO rider (Rider_ID,Rider_name,Rider_contactNo,Rider_Email)
     values ('$id', '$nama', '$contact','$email')";

$result = mysqli_query($conn,$query) or die ("Could not execute query in AddProfile.php");




if (mysqli_query($conn, $query)) {
      
    echo "success";
     
 } else {
     echo "Error: " . $query . "<br>" . mysqli_error($conn);
 }

 if($result){
    echo "<script type = 'text/javascript'> window.location='../Profile.php' </script>";
   }

?>
