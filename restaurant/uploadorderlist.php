<?php
  include("dbase.php");
  session_start();
?>
<!DOCTYPE html>
<?php 
   
        

    mysqli_select_db($conn, "foody") or die(mysqli_connect_error());
    $fi = $_POST["id"];
    $quan = $_POST["quantity"];
    $dateorder=date('Y-m-d', strtotime($_POST['orderdate']));
    

    $sqliinsert = "INSERT INTO list(list_date, list_quantity, menuid, list_state) 
				        VALUES('$dateorder','$quan','$fi','Preparing')";
	mysqli_query($conn, $sqliinsert);
    header("Location: list.php");

?>