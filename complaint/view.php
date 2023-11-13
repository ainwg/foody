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

    <header>Header</header>

    <div id="main">

      <article>
        <a href="list.php">BACK</a>
        <h4><b>Complaint Details</b></h4>

        <?php
        if(isset($_GET['comp_id']))
        {
            $comp_id = mysqli_real_escape_string($conn, $_GET['comp_id']);
            $query = "SELECT * FROM complaint WHERE comp_id='$comp_id' ";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                $user = mysqli_fetch_array($query_run);
                ?>

                <table class="table table-bordered">
                  <tr>
                    <th>ID</th>
                    <td><?php echo $user['comp_id']; ?></td>
                  </tr>
                  <tr>
                    <th>Rider ID</th>
                    <td><?php echo $user['riderid']; ?></td>
                  </tr>
                  <tr>
                    <th>Type</th>
                    <td><?php echo $user['comp_type']; ?></td>
                  </tr>
                  <tr>
                    <th>Description</th>
                    <td><?php echo $user['comp_desc']; ?></td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td><?php echo $user['comp_status']; ?></td>
                  </tr>
                  <tr>
                    <th>Date Time</th>
                    <td><?php echo $user['comp_datetime']; ?></td>
                  </tr>
                </table>
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
