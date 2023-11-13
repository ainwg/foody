<?php
  include("dbase.php");
  session_start();

  mysqli_select_db($conn, "foody") or die(mysqli_connect_error());
  

    $stqlise ="SELECT * FROM list INNER JOIN menu ON list.menuid = menu.menuid";
    $sp = mysqli_query($conn,$stqlise);
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../restaurant/css/style.css">
    <link rel="stylesheet" href="../restaurant/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
          <td colspan="5" align="center"><h2>ORDER LIST</h2></td>
        </tr>
        <tr>
        <td width="20%">BIL</td>
                    <td>DATE</td>
                    <td>NAME</td>
                    <td>QUANTITY</td>
                    <td>state</td>

        </tr>
        <?php
                
                $total = 0;
                $count = 1;
                $a = 0;
                while($row = mysqli_fetch_array($sp)){ 
                    $date = strtotime($row['list_date']);
                    ?> 
                    
                    <form method="post" action="updateorderlist.php">
                    <tr>
                    <input type="hidden"  name="id[]" value="<?=$row['orderlistid']?>">
                      <td><?php echo $count?></td>
                      <td><?php echo date("j F Y",$date)?></td>
                      <td><?php echo $row['menuname']?></td>
                      <td><?php echo $row['list_quantity']?></td>
                      <td>
                        <select name="state[]" align="center">
                          <option><?php echo $row['list_state']?></option>
                          <option>Delivered</option>
                          <option>Preparing</option>
                          <option>Cancelled</option>
                        </select>
                      </td>
                    </tr>
                    
                   
                <?php 
                $total = $total + $row['list_quantity'];
                 $count++;   
                } 
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total:</td>
                    <td><?php echo $total?></td>
                    <td>
                    <div class="d-grid gap-2 col-6 mx-auto" align="center" >
                      <button class="btn btn-primary" type="submit" >Update state</button>
                    </div>
                    </td>
                </tr>
                    </form>
        </table>
        <form action="dashboard.php">
                <div class="d-grid gap-2 col-6 mx-auto" align="center" >
                <button class="btn btn-primary" type="submit" >BACK TO DASHBOARD</button>
                </div>
        </form>
        <br><br>
        <div style="width:500px;position:relative;left:300px;">
            <canvas id="myChart"></canvas>
        </div>
    <br><br>
    </div>

    <div class="footer">
      <p>Copyright &copy; 2022 UMP FOODY. All rights reserved.</p>
    </div>

    <?php 
        $dateorderlist ="SELECT MONTHNAME(list_date) AS mth, sum(list_quantity) as countquan  
        FROM list
        GROUP BY MONTHNAME(list_date)
        ORDER BY MONTHNAME(list_date)";
        
        $dtl = mysqli_query($conn,$dateorderlist);
        
        $count =array();
        foreach($dtl as $data)
        {
            $month[]=$data['mth'];
            $count[]=$data['countquan'];
        }
    ?>
    <script>
        const labels = <?php echo json_encode($month)?>;
        const data = {
        labels: labels,
        datasets: [{
            label: 'Quantity Food Order',
            data: <?php echo json_encode($count)?>,
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
            ],
            borderWidth: 2
        }]
        };

        const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        },
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
  </body>
</html>
