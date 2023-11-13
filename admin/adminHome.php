<?php
  include('server.php');
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

    .center
            {
                margin:auto;
                width: 200px;
                padding: 10px;
            }
  </style>

  <header></header>

  <div id="main">

    <!-- content -->
    <article>
    <?php
// set the default time zone to use in Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');
?>
<div align="center">
<table width="379" height="286" border="3" bordercolor="#FF80AA">
  <tr>
    <td height="190" bgcolor="#7FFFD4"><p align="center" class="style1"><strog>User Profile</strong></p>
      <div align="center">
        <span class="style3">Date : <?php echo date("d-m-Y"); ?></span>
      </div>
      	<p align="center" class="style1"></p>
 	<div align="center">
          <span class="style3">Time : <?php echo date("H:i", time()); ?></span>
      	</div>
	<p align="center" class="style1">
	  [<a href="createUser.php">Create</a> | <a href="ViewUser.php">View</a>| <a href="searchUser.php">Search</a>]
	</p>
  </tr>
</table>
<p class="style1">&nbsp;</p>
</div>
    </article>

    <!-- sidebar -->
    <nav class="sidebar">
      <img src="asset\foodylogo.png" width="125px"><br><br>
      <b><a href="adminhome.php">HOME</a></b><br>
      <b><a href="QR.php">QR CODE</a></b><br>
      <b><a href="report.php">REPORT</a></b>
    </nav>

  </div>

  <!-- <footer>Copyright &copy; 2022 UMP FOODY. All rights reserved</footer> -->

</body>
</html>