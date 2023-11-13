<?php

  require 'dbase.php';
  session_start();

  if(isset($_POST['save_comp'])) {

    $ID = mysqli_insert_id($conn);
    $riderid = mysqli_real_escape_string($conn, $_POST['riderid']);
    $comp_type = mysqli_real_escape_string($conn, $_POST['comp_type']);
    $comp_desc = mysqli_real_escape_string($conn, $_POST['comp_desc']);

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $comp_datetime = date('Y-m-d H:i:s');

    $query = "INSERT INTO complaint (ID, riderid, comp_type, comp_desc, comp_status, comp_datetime)
    VALUES ('$ID',(SELECT riderid FROM rider WHERE riderid='$riderid'),'$comp_type','$comp_desc','In Investigation','$comp_datetime')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
      echo '<script type ="text/JavaScript">';  
      echo 'alert("Complaint Inserted Successfully")';  
      echo '</script>';
    }
    else
    {
      echo '<script type ="text/JavaScript">';  
      echo 'alert("Complaint Not Inserted")';  
      echo '</script>';
    }
  }

  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>UMP FOODY</title>
  </head>
  <body>

    <header>Header</header>

    <div id="main">

      <article>

      <h4><b>Complaint Form</b></h4>

        <form action="create.php" method="POST">
        <fieldset class="fs-width">
          Rider ID: <br>
          <input type="text" name="riderid" required><br><br>
          Type of Complaint: <br>
          <input type="radio" name="comp_type" value="Late Delivery" required>  Late Delivery
          <input type="radio" name="comp_type" value="Damaged Food">  Damaged Food
          <input type="radio" name="comp_type" value="Others">  Others<br><br>
          Please specify more details <br>
          <textarea name="comp_desc" placeholder="Describe here ..." rows="5" cols="100" required></textarea>
        </fieldset><br>
        <button type="submit" name="save_comp">Submit</button> <br>
        <a href="list.php">View Complaint List</a>
        </form>
    
      </article>

      <nav class="sidebar">
        <img src="img/foodylogo.png" width="125px"><br><br>
        <b><a href="index.php">HOME</a></b><br>
        <b><a href="#">RESTAURANT</a></b><br>
        <b><a href="order.php">MY ORDER</a></b><br>
        <b><a href="create.php">COMPLAINT</a></b><br>
        <b><a href="report.php">REPORT</a></b><br>
        <b><a href="../admin/logOut.php">LOG OUT</a></b>
      </nav>

    </div>

    <!-- <footer><p>Copyright &copy; 2022 UMP FOODY. All rights reserved.</p></footer> -->

  </body>
</html>
