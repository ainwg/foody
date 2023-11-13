<?php
  include("dbase.php");
  session_start();
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
      <img src="asset/foodylogo.png" width="125px"><br><br>
      <b><a href="dashboard.php">Home</a></b><br>
      <b><a href="restaurant.php">Edit Menu</a></b><br>
      <b><a href="list.php">Order list</a></b><br>
      <b><a href="menu.php">Menu for customer</a></b><br>
      <b><a href="../admin/logOut.php">Log Out</a></b>
    </nav>

  </div>

    <div class="content" style = "position:relative;top:-200px;left:100px;" >
      <table border="2" align="center" width="60%">
      
      <br>
        <tr>
          <td colspan="2" align="center"><h2>MENU</h2></td>
        </tr>
        <tr>
        
        <?php
                
        
                

                $strprint = "SELECT* from menu";
                $sp = mysqli_query($conn,$strprint);
                $count = 0;
                while($row = mysqli_fetch_array($sp)){ 
                    echo "<td>" ?>
                    <form align="center">
                    <div class="alb" >
                      <img src="img/<?=$row['menuphoto']?>" width="250px" height="200px">
                    </div> 
                    <br>
                    <?php 
                    echo "Name :" . htmlspecialchars($row['menuname']) . 
                    "<br>" . "Price : RM" . number_format(htmlspecialchars($row['menuprice']),2) . 
                    "<br>" . "Food Description: " . htmlspecialchars($row['menudesc']) . 
                    "<br>". "Category: " . htmlspecialchars($row['menucategory']) . 
                    "<br>". "Status: " . htmlspecialchars($row['menustatus']). "</td>"; 
                    ?>
                    </form>
                    <?php 
                    if($count<1){
                      $count++;
                    }else{
                      echo "</tr><tr>";
                      $count=0;
                    }?>
                <?php    
                } 
                
                mysqli_close($conn);
                ?>
                </tr>
              <tr>
              <td>
              <form action="deleterest.php">
                <div class="d-grid gap-2 col-6 mx-auto" align="center" >
                <button class="btn btn-primary"type="submit" >DELETE</button>
                </div>
              </form>
              <br>
              <form action="updaterest.php" align="center">
                  <div class="d-grid gap-2 col-6 mx-auto" align="center" >
                  <button class="btn btn-primary"type="submit" >UPDATE</button>
                  </div>
              </form>
              </td>
              <td>
              <form action="insertrest.php">
                <div class="d-grid gap-2 col-6 mx-auto" align="center" >
                <button class="btn btn-primary" type="submit" >INSERT NEW FOOD</button>
                </div>
              </form>
              </td>
              </tr>
      </table>

      
    <br><br>
    </div>

    <div class="footer">
      <p>Copyright &copy; 2022 UMP FOODY. All rights reserved.</p>
    </div>

    
    
  </body>
</html>
