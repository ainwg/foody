<?php include('server.php');
?>

<?php 
    $query = "SELECT userType, count(*) as number FROM userlogin GROUP BY userType";  
 $result = mysqli_query($link, $query);  
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Usertype', 'number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["userType"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of User (%)',   
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>

<div align="center">[ <a href="adminHome.php">Homepage</a> |
           <a href="report.php">Back</a> ] </div>
    <div style="padding: 50px;">
    <div style="width:900px;">  
                <h3 align="center">Graph view based on user type</h3>  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
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