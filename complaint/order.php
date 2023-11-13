<?php
  require 'dbase.php';
  session_start();
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

  <header></header>

  <div id="main">

    <!-- content -->
    <article>

        <h4><b>Order List</b></h4>

          <table>
          
          <tr>
            <th>Rider ID</th>
          </tr>
            <?php
              $query = "SELECT riderid FROM rider";
              $query_run = mysqli_query($conn, $query);

              if(mysqli_num_rows($query_run) > 0) {

                foreach($query_run as $user) {
                ?>
                <tr>
                  <td><?php echo $user['riderid']; ?></td>
                </tr>
                <?php
                }
              }
              else {
                echo "<h5> No Record Found </h5>";
              }
          ?>
          </table>
    
    </article>

    <!-- sidebar -->
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
