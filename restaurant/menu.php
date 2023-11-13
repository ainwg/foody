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
      <img src="asset\foodylogo.png" width="125px"><br><br>
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
          <td colspan="3" align="center"><h2>MENU</h2></td>
        </tr>
        <tr>
        
        <?php
                
        
                mysqli_select_db($conn, "foody") or die(mysqli_connect_error());

                $strprint = "SELECT* from menu";
                $sp = mysqli_query($conn,$strprint);
                $count = 0;
                while($row = mysqli_fetch_array($sp)){ 
                    ?> <td rowspan="8"> 
                    <form action="uploadorderlist.php" method="post">
                    <div class="alb" align="center">
                      <img src="img\<?=$row['menuphoto']?>" width="250px" height="200px">
                    </div> 
                    </td>
                    <tr>
                      <input type="hidden"  name="id" value="<?=$row['menuid']?>">
                      <td width="30%">Name: </td>
                      <td><input type="text" name="name" value="<?=$row['menuname']?>"></td>
                    </tr>
                    <tr>
                      <td>Price:</td> 
                      <td><input type="number" name="price" value="<?=number_format($row['menuprice'],2)?>"></td>
                    </tr>
                    <tr>
                      <td>Description:</td>
                      <td><textarea name="desc" ><?=$row['menudesc']?></textarea></td>
                    </tr>
                    <tr>
                      <td>Category:</td> 
                      <td><input type="text" name="catego" value="<?=$row['menucategory']?>"></td>
                    </tr>

                    <tr>
                      <td>Status:</td> 
                      <td><input type="text" name="status" value="<?=$row['menustatus']?>"></td>
                    </tr>
                    <tr>
                      <td>Date (Today Date): </td>
                      <td><input type="date" id="start" name="orderdate"
                          value="2022-06-17"
                          min="2022-01-01" max="2022-12-31">
                      </td>
                    </tr>
                    <tr>
                    <td>
                    <div class="d-grid gap-2 col-6 mx-auto" align="center" >
                        <input type="number" name="quantity">
                        </td>
                        <td>
                        <button class="btn btn-primary"type="submit">Add To Cart</button>
                    </div>
                    </td>
                    </tr>
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
              
              
              
              
              
      </table>

      
    <br><br>
    </div>

    <div class="footer">
      <p>Copyright &copy; 2022 UMP FOODY. All rights reserved.</p>
    </div>

    
    
  </body>
</html>
