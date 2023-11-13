<?php
  include("dbase.php");
  session_start();
?>
<!DOCTYPE html>
<?php 
   

    mysqli_select_db($conn, "foody") or die(mysqli_connect_error());

    $fuid = $_POST['foodupid'];

    $strprint = "SELECT* from menu where menuid='$fuid'";
    
    $sp = mysqli_query($conn,$strprint);
    $row = mysqli_fetch_array($sp);
   
    
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
      <img src="asset/foodylogo.png" width="125px"><br><br>
      <b><a href="index.php">Home</a></b><br>
      <b><a href="restaurant.php">Edit Menu</a></b><br>
      <b><a href="list.php">Order list</a></b><br>
      <b><a href="menu.php">Menu for customer</a></b><br>
      
    </nav>

  </div>s
    
  <div class="content" style = "position:relative;top:-300px;" >
      
    <form action="updatingrest.php" method="post" enctype="multipart/form-data">
    <table border="2" align="center" width="60%">  
        
        <tr>
            <td>Food ID</td>
            <td><input type="text"name="foodid" value="<?php echo $row['menuid'];?>">
            </td>
        </tr>
        <br>
        <tr>
            <td>Restaurant ID:</td>
            <td><input name="restauid" type="text" value="<?php echo $row['restid'];?>"></td>
        </tr>
        <br>
        <tr>
            <td>Food Name:</td>
            <td><input name="foodname" type="text" value="<?php echo $row['menuname'];?>"></td>
        </tr>

        <tr>
            <td>Food Price:</td>
            <td><input name="foodprice" type="number" step="0.01" value="<?php echo number_format($row['menuprice'],2);?>"></td>
        </tr>

        <tr>
            <td>Food Category:</td>
            <td>
                <select name="cate">
                    <option> <?php echo $row['menucategory'];?></option>
                    <option> Food </option>
                    <option> Drink </option>
                    <option> Dessert </option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Food Description:</td>
            <td>
                <textarea rows="4" cols="36" name="desc"><?php echo $row['menudesc'];?></textarea>
            </td>
        </tr>

        <tr>
            <td>Food Status:</td>
            <td>
                <select name="state">
                    <option> <?php echo $row['menustatus'];?></option>
                    <option> Available </option>
                    <option> Unavailable </option>
                    <option> Coming Soon! </option>
                </select>
            </td>
        </tr>
        
        <tr>
            
            <td>Upload Photo:</td>
            <td>
            <input type="file" 
                    name="my_image"/><span name="old" value="<?=$row['menuphoto']?>"><?php echo $row['menuphoto']?></span>
            </td>
            
        </tr>
        </table>
        <input type="submit" value="UPDATE" name="submit">
      </table>
    </div>

    

    <div class="footer">
      <p>Copyright &copy; 2022 UMP FOODY. All rights reserved.</p>
    </div>

    
    
    
  </body>
</html>