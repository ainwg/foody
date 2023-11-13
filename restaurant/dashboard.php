<?php
  include("dbase.php");
  session_start();
  
        mysqli_select_db($conn, "foody") or die(mysqli_connect_error());

        $strmenu = "SELECT count(*) as 'calc' from menu";
        $sp = mysqli_query($conn,$strmenu);
        $row = mysqli_fetch_assoc($sp);
        
        $strmenu = "SELECT count(*) as 'calc1' FROM list";
        $sp1 = mysqli_query($conn,$strmenu);
        $row1 = mysqli_fetch_assoc($sp1);

        
                       
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../restaurant/css/style.css">
    <link rel="stylesheet" href="../restaurant/css/bootstrap.css">
    
    <title>UMP FOODY</title>
  </head>
  <body>

  <header></header>

  <div id="main">

    <!-- content -->
    <article>
      <h1>DASHBOARD</h1><br><br>
    
      <div class="content">
      <table align="center" border="1" width="60%">
      <div class="row">
          <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                  <div class="card-body">Menu <?php echo "<br>"." Number of Food: ".$row['calc']?></div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="restaurant.php">Edit Menu</a>
                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-warning text-white mb-4">
                  <div class="card-body">Orderlist  <?php echo "<br>"." Number of Order: ".$row1['calc1']?></div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="list.php">View Details</a>
                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
              </div>
          </div>                    
      </div>
                
    </table>
  
    </article>

    <!-- sidebar -->
    <nav class="sidebar">
      <img src="asset/foodylogo.png" width="125px"><br><br>
      <b><a href="dashboard.php">Home</a></b><br>
      <b><a href="restaurant.php">Edit Menu</a></b><br>
      <b><a href="list.php">Order list</a></b><br>
      <b><a href="menu.php">Menu for customer</a></b><br>
      <b><a href="../admin/logOut.php">Log Out</a></b>
    </nav>

  </div>


</div>

    <!-- <div class="footer" align="center">
      <p>Copyright &copy; 2022 UMP FOODY. All rights reserved.</p>
    </div> -->

    
    
  </body>
</html>
