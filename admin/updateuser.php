<?php include('server.php');?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\bootstrap.css">
    <title>UMP FOODY</title>
    <a href="logOut.php" style="float:right">Log out</a>
  </head>
  <body>

  <style>
    .style1 {font-family: Verdana, Arial, Helvetica, sans-serif}

    .style3
    {font-family:Verdana, Arial, Helvetica, sans-serif;
      font-size: 12px;
        font-weight: bold;
    }

    .center
    {
        margin:auto;
        width: 500px;
        padding: 20px;
    }

    li
    {
        background-color: #3B9C9C; 
        padding: 12px; 
        border-radius: 10px;
        width: 120%;
        border-style: dotted;
        border-color: white;
    }
  </style>

  <header></header>

  <div id="main">

    <!-- content -->
    <article>
    <?php

$idURL = $_GET['id'];

$query = "SELECT * FROM userprofile WHERE id = '$idURL'";
$result = mysqli_query($link,$query) or die ("Could not execute query in updateUser.php");
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$address = $row['address'];
$contactNum = $row['contactNum'];

?>

<div class="center"> 
		<form method="post" action="updateDb.php">
Name:
<input type ="text" name="name" size="60" value="<?php echo $name; ?>">
<br>
<br>
Email:
<input type ="text" name="email" size="60" value="<?php echo $email; ?>">
<br>
<br>
Address :
<input type ="text" name="address" size="75" value="<?php echo $address; ?>">
<br>
<br>
Contact Number :
<input type ="number" name="contactNum" size="60" value="<?php echo $contactNum; ?>">
<br>
<br>
<input type ="hidden" name="id" value="<?php echo $idURL; ?>">
<input type ="submit" value="Update">
<input type="reset" value="Reset">
<br>
</form>
<hr>
<div align="centre">[ <a href="ViewUser.php"]>View</a> |
<a href="adminHome.php">Homepage</a> |
<a href="createUser.php">Add</a> ] </div>

</div> 
    </article>

<!-- sidebar -->
<nav class="sidebar">
  <img src="asset\foodylogo.png" width="125px"><br><br>
  <b><a href="adminhome.php">HOME</a></b><br>
  <b><a href="listuser.php">QR CODE</a></b><br>
  <b><a href="report.php">REPORT</a></b>
</nav>

</div>

<!-- <footer>Copyright &copy; 2022 UMP FOODY. All rights reserved</footer> -->

</body>
</html>