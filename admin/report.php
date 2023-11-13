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
    <div class="center"> 

<?php
include("server.php");

    

// calculate restaurant owner 
$query_RO = "SELECT * FROM userlogin WHERE usertype = 'RO'";
$result_RO = mysqli_query($link,$query_RO);
$total_RO = 0;

if (mysqli_num_rows($result_RO) > 0){
    while($row = mysqli_fetch_assoc($result_RO)){
    $total_RO = $total_RO + 1;
    }
} 

// calculate General User 
$query_GU = "SELECT * FROM userlogin WHERE usertype = 'GU'";
$result_GU = mysqli_query($link,$query_GU);
$total_GU = 0;

if (mysqli_num_rows($result_GU) > 0){
    while($row = mysqli_fetch_assoc($result_GU)){
    $total_GU = $total_GU + 1;
    }
} 

// calculate Rider 
$query_rider = "SELECT * FROM userlogin WHERE usertype = 'Rider'";
$result_rider = mysqli_query($link,$query_rider);
$total_rider = 0;

if (mysqli_num_rows($result_rider) > 0){
    while($row = mysqli_fetch_assoc($result_rider)){
    $total_rider = $total_rider + 1;
    }
}

//total calculate  pekan
$query_pekan = "SELECT * FROM userprofile WHERE address like '%pekan%'";
$result_pekan = mysqli_query($link,$query_pekan);
$total_pekan = 0;

if (mysqli_num_rows($result_pekan) > 0){
    while($row = mysqli_fetch_assoc($result_pekan)){
    $total_pekan = $total_pekan + 1;
    }
} 
// else {
//     echo "0 results";

// }

//total userprofile
$query_userprofile = "SELECT * FROM userprofile ";
$result_userprofile = mysqli_query($link,$query_userprofile);
$total_userprofile = 0;

if (mysqli_num_rows($result_userprofile) > 0){
    while($row = mysqli_fetch_assoc($result_userprofile)){
    $total_userprofile = $total_userprofile + 1;
    }
} 


?>


<!-- output user type -->
<h3>Total User Based On User Type</h3><br><br>
<td>Total Restaurant Owner : [<?php echo $total_RO; ?>]</td><br><br>
<td>Total General User : [<?php echo $total_GU; ?>]</td><br><br>
<td>Total Rider : [<?php echo $total_rider; ?>]</td><br><br>


<!-- total  output address -->
<h3>Total User Based On Address</h3><br><br>
<td>Total in Pekan : [<?php echo $total_pekan; ?>]</td><br><br>
<td>Total Outside Pekan : [<?php echo $total_userprofile - $total_pekan; ?>]</td><br><br>

</div> 

<div align="center">[ <a href="adminHome.php">Homepage</a> |
<a href="GraphView.php">Graph View</a> ] </div>
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