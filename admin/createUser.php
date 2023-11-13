<?php include('server.php');
?>

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

    .container {
  width: 500px;
  clear: both;
}

.container input {
  width: 100%;
  clear: both;
}
  </style>

  <header></header>

  <div id="main">

    <!-- content -->
    <article>
    <div class="container">
            <h1>Create User Profile</h1>
            <form method="post" action="insertDb.php">
            Name :
            <input type="text" name="name" size="40">
            <br>
            <br>
            Email :
            <input type="text" name="email" size="25">
            <br>
            <br>
            Address :
            <input type="text" name="address" size="75">
            <br>
            <br>
            Contact Number :
            <input type="number" name="contactNum" size="13">
            <br>
            <br>
            <input type="submit" value="Submit">
            <br>
            <br>
            <input type="reset" value="Reset">
            <br>
            </form>
            <hr>
            <div align="center">[ <a href="ViewUser.php">View</a> | 
            <a href="adminHome.php">Homepage</a> ] </div>
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