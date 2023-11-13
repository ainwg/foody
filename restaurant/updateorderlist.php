<?php
  include("dbase.php");
  session_start();
?>
<!DOCTYPE html>
<?php 
   
        

    mysqli_select_db($conn, "foody") or die(mysqli_connect_error());
    $fi = array();
    $state = array();

    foreach($_POST["id"] as $a){
        $fi[] = $a;
    }
    foreach($_POST["state"] as $a){
        $state[] = $a;
    }
    
    $isarray = array_combine($fi, $state);
    
    
    foreach($isarray as $b=> $a){
            $sqliinsert = 
            "UPDATE list 
            SET list_state = '$a'
             WHERE orderlistid = '$b'";
            mysqli_query($conn, $sqliinsert);
            
        }
    
        header("Location: list.php");
 
    

?>