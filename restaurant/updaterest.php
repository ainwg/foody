<?php
  include("dbase.php");
  session_start();
?>
<!DOCTYPE html>
<?php 
    
    mysqli_select_db($conn, "foody") or die(mysqli_connect_error());
    
?>
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
    <?php $str = "SELECT* from restaurant";
            $sp1 = mysqli_query($conn,$str); 
            $row1 = mysqli_fetch_array($sp1)
    ?>
    <article>
    <h1 align="middle"><?php echo $row1['restname']?></h1>
    <h3 align="middle"><?php echo $row1['restlocation']?></h3>
    <h3 align="middle"><?php echo $row1['restoperation']?></h3>
    <h3 align="middle"><?php echo "Phone Number:". $row1['restphone']?></h3>
    </article>

    <!-- sidebar -->
    <nav class="sidebar">
      <img src="asset\foodylogo.png" width="125px"><br><br>
      <b><a href="index.php">Home</a></b><br>
      <b><a href="restaurant.php">Edit Menu</a></b><br>
      <b><a href="list.php">Order list</a></b><br>
      <b><a href="menu.php">Menu for customer</a></b><br>
      
    </nav>

  </div>

  <div class="content" style = "position:relative;top:-200px;" >
      <table border="2" align="center" width="60%">
      
      <br>
      
        <tr>
          <td colspan="2" align="center"><h2>Which Food information you want to update?</h2></td>
        </tr>
        <tr>
            <td>Food ID that you want to change: </td>
            <td>
            <form action="updating.php" method="post">
              <input type="text"name="foodupid"> 
              <div class="update" >
                <button type="submit" >UPDATE</button>
              </div>
            </form>
            </td>

        </tr>
    
        
      </table>

      
    </div>
    <div class="footer">
      <p>Copyright &copy; 2022 UMP FOODY. All rights reserved.</p>
    </div>

    
    
  </body>
</html>