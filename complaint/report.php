<?php
  require 'dbase.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>UMP FOODY</title>
  </head>
  <body>

    <header>Header</header>

    <div id="main">

      <article>
        <h4>Report</h4>

          <table>
            <tr>
              <td>Total Complaint</td>
            </tr>
            <tr>
              <td>
                <?php
                  $query = "SELECT COUNT(comp_id) AS total FROM complaint";
                  $result = mysqli_query($conn, $query);
                  // Fetch a result row as an associative array
                  $values = mysqli_fetch_assoc($result);
                  $rows = $values['total'];
                  ?>
                  <h3> <?php echo $rows; ?></h3>
              </td>
            </tr>
          </table>

        <hr>

        <?php
        $query = "SELECT COUNT(comp_type) AS total FROM complaint WHERE comp_type='Late Delivery'";
        $query_run = mysqli_query($conn, $query);
        $values = mysqli_fetch_assoc($query_run);
        $rowsLateDel = $values['total'];

        $query = "SELECT COUNT(comp_type) AS total FROM complaint WHERE comp_type='Damaged Food'";
        $query_run = mysqli_query($conn, $query);
        $values = mysqli_fetch_assoc($query_run);
        $rowsDamFood = $values['total'];

        $query = "SELECT COUNT(comp_type) AS total FROM complaint WHERE comp_type='Others'";
        $query_run = mysqli_query($conn, $query);
        $values = mysqli_fetch_assoc($query_run);
        $rowsOthers = $values['total'];
        ?>

        <!-- style the chart -->
        <div style="width: 700px;">
          <canvas id="myChart"></canvas>
        </div>

        <script>
          //setup
          const labels = ['Late Delivery', 'Damaged Food', 'Others'];
          const data = {
            labels: labels,
            datasets: [{
              label: 'Complaint Dataset',
              data: [ <?php echo $rowsLateDel; ?>, <?php echo $rowsDamFood; ?>, <?php echo $rowsOthers; ?> ],
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
              borderWidth: 1
            }]
          };

          //config
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

          // render / init block
          var myChart = new Chart(
            document.getElementById('myChart'),
            config
          );
        </script>

      </article>

      <nav class="sidebar">
        <img src="img/foodylogo.png" width="125px"><br><br>
        <b><a href="index.php">HOME</a></b><br>
        <b><a href="#">RESTAURANT</a></b><br>
        <b><a href="order.php">MY ORDER</a></b><br>
        <b><a href="create.php">COMPLAINT</a></b><br>
        <b><a href="report.php">REPORT</a></b><br>
        <b><a href="../admin/logOut.php">LOG OUT</a></b>
      </nav>

    </div>


  <!-- <footer>Copyright &copy; 2022 UMP FOODY. All rights reserved</footer> -->

  </body>
</html>
