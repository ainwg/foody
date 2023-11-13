<?php

  session_start();
  require 'dbase.php';

  if(isset($_POST['update_comp'])) {

    $comp_id = mysqli_real_escape_string($conn, $_POST['comp_id']);
    $rider_id = mysqli_real_escape_string($conn, $_POST['riderid']);
    $comp_type = mysqli_real_escape_string($conn, $_POST['comp_type']);
    $comp_desc = mysqli_real_escape_string($conn, $_POST['comp_desc']);

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $comp_datetime = date('Y-m-d H:i:s');

    $query = "UPDATE complaint SET comp_type='$comp_type', comp_desc='$comp_desc', comp_status='In Investigation', comp_datetime='$comp_datetime' WHERE comp_id='$comp_id' ";
    $result = mysqli_query($conn, $query);

    if($result) {
      echo '<script type ="text/JavaScript">';  
      echo 'alert("Complaint Updated Successfully")';
      echo '</script>';
      header("location: list.php");
    }
    else {
      echo '<script type ="text/JavaScript">';  
      echo 'alert("Complaint Not Updated")';
      echo '</script>'; 
      header("location: list.php");
    }

  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>UMP FOODY</title>
  </head>
  <body>

  <header>Header</header>

  <div id="main">

    <article>
      <a href="list.php">BACK</a>
      <h4><b>Edit Complaint</b></h4>

      <?php
      if(isset($_GET['comp_id']))
      {
          $comp_id = mysqli_real_escape_string($conn, $_GET['comp_id']);
          $query = "SELECT * FROM complaint WHERE comp_id='$comp_id'";
          $query_run = mysqli_query($conn, $query);

          if(mysqli_num_rows($query_run) > 0)
          {
              $user = mysqli_fetch_array($query_run);
              ?>
              <form action="edit.php" method="POST">
              <fieldset class="fs-width">
                Complaint ID: <br>
                <input type="text" name="comp_id" value="<?php echo $user['comp_id']; ?>" readonly><br>
                Rider ID: <br>
                <input type="text" name="riderid" value="<?php echo $user['riderid'];?>" readonly><br><br>
                Type of Complaint: <br>
                <input type="radio" name="comp_type" value="Late Delivery" required>  Late Delivery
                <input type="radio" name="comp_type" value="Damaged Food">  Damaged Food
                <input type="radio" name="comp_type" value="Others">  Others<br><br>
                Please specify more details <br>
                <textarea name="comp_desc" value="<?php echo $user['comp_desc'];?>" placeholder="Describe here ..." rows="5" cols="100" required></textarea>
              </fieldset><br>
              <button type="submit" name="update_comp">Update</button>
              </form>
              <?php
          }
          else {
              echo "<h4>No Such Id Found</h4>";
          }
      }
      ?>
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

  <!-- <footer>Copyright &copy; 2022 UMP FOODY. All rights reserved</footer> -->

  </body>
</html>
