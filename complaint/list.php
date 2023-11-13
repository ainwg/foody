<?php
  require 'dbase.php';
  session_start();

  if(isset($_POST['delete_comp'])) {

    $comp_id = mysqli_real_escape_string($conn, $_POST['delete_comp']);

    $query = "DELETE FROM complaint WHERE comp_id='$comp_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
      echo '<script type ="text/JavaScript">';  
      echo 'alert("Complaint Deleted Successfully")';  
      echo '</script>';
    }
    else
    {
      echo '<script type ="text/JavaScript">';  
      echo 'alert("Complaint Not Deleted")';  
      echo '</script>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
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
        <a href="create.php">Add New Complaint</a><br><br>
        <h4><b>Complaint List</b></h4>
        <form action="list.php" method="post">
          <select name="comp_type">
            <option disabled selected>Complaint Type</option>
            <option value="Late Delivery">Late Delivery</option>
            <option value="Damaged Food">Damaged Food</option>
            <option value="Others">Others</option>
          </select>
		      <button type="submit" name="search_comp">Search</button>
          <a href="list.php">Clear Search</a>
        </form>

        <table class="table table-bordered">
          <?php 
          if(isset($_POST['search_comp'])) {
            ?>
            <tr>
              <th>ID</th>
              <th>Rider ID</th>
              <th>Type</th>
              <th>Description</th>
              <th>Status</th>
              <th>Date Time</th>
              <th>Action</th>
            </tr>
            <?php
            $comp_type = mysqli_real_escape_string($conn, $_POST['comp_type']);
            $query = "SELECT * FROM complaint WHERE comp_type='$comp_type'";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0) {

              foreach($query_run as $user) {
              ?>
              <tr>
                <td><?php echo $user['comp_id']; ?></td>
                <td><?php echo $user['riderid']; ?></td>
                <td><?php echo $user['comp_type']; ?></td>
                <td><?php echo $user['comp_desc']; ?></td>
                <td><?php echo $user['comp_status']; ?></td>
                <td><?php echo $user['comp_datetime']; ?></td>
                <td>
                  <button class="btn btn-outline-success btn-sm" onclick="window.location.href='view.php?comp_id=<?php echo $user['comp_id']; ?>;'">View</button>
                  <button class="btn btn-outline-info btn-sm" onclick="window.location.href='edit.php?comp_id=<?php echo $user['comp_id']; ?>'">Edit</button>
                  <form action="list.php" method="POST">
                    <button type="submit" class="btn btn-outline-danger btn-sm" name="delete_comp" value="<?php echo $user['comp_id'];?>">Delete</button>
                  </form>
                </td>
              </tr>
              <?php
              }
            }
            else {
              echo "<h5> No Record Found </h5>";
            }
          }
          else {
            ?>
            <tr>
              <th>ID</th>
              <th>Rider ID</th>
              <th>Type</th>
              <th>Description</th>
              <th>Status</th>
              <th>Date Time</th>
              <th>Action</th>
            </tr>
            <?php
              $query = "SELECT * FROM complaint";
              $query_run = mysqli_query($conn, $query);

              if(mysqli_num_rows($query_run) > 0) {

                foreach($query_run as $user) {
                ?>
                <tr>
                  <td><?php echo $user['comp_id']; ?></td>
                  <td><?php echo $user['riderid']; ?></td>
                  <td><?php echo $user['comp_type']; ?></td>
                  <td><?php echo $user['comp_desc']; ?></td>
                  <td><?php echo $user['comp_status']; ?></td>
                  <td><?php echo $user['comp_datetime']; ?></td>
                  <td>
                    <button class="btn btn-outline-success btn-sm" onclick="window.location.href='view.php?comp_id=<?php echo $user['comp_id']; ?>;'">View</button>
                    <button class="btn btn-outline-info btn-sm" onclick="window.location.href='edit.php?comp_id=<?php echo $user['comp_id']; ?>'">Edit</button>
                    <form action="list.php" method="POST">
                      <button type="submit" class="btn btn-outline-danger btn-sm" name="delete_comp" value="<?php echo $user['comp_id'];?>">Delete</button>
                    </form>
                  </td>
                </tr>
                <?php
                }
              }
              else {
                echo "<h5> No Record Found </h5>";
              }
          }
          ?>
          </table>
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
