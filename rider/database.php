<?php
    $conn = mysqli_connect('localhost', 'root');
    
    if (mysqli_connect_error())
    {
        echo "Failed to Connect to MySQL : ".mysqli_connect_error();
    }

    mysqli_select_db($conn, "foody") or die(mysqli_connect_error());
   
   date_default_timezone_set('Asia/Kuala_Lumpur');
  
    
?>