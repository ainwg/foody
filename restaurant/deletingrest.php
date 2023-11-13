<?php
  include("dbase.php");
  session_start();
?>
<!DOCTYPE html>
<?php 
    
        
    
    mysqli_select_db($conn, "foody") or die(mysqli_connect_error());
    $fid = $_POST["deletefoodid"];
    $sqlimage = "DELETE FROM MENU WHERE menuid='$fid'";
	mysqli_query($conn, $sqlimage);
    mysqli_close($conn);
?>
<html>
    <body>
        <h1>Already Deleted</h1>
        <form action="restaurant.php">
        <button type="submit" >GO TO RESTAURANT PAGE</button>
        </form> 
    </body>
</html>