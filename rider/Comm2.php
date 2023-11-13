<?php 
include ('database.php');

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>UMP FOODY</title>
  </head>
  <body>
  <?php include 'template.php' ?></tr>

    <header>Header</header>

    <div id="main">

      <article>
        <h4>Report</h4>

          <table>
            <tr>
              <td>Total commission</td>
            </tr>
            <tr>
              <td>
               
              </td>
            </tr>
          </table>

        <hr>
<center>
        <?php
        $query = "SELECT comm FROM commission WHERE day='sunday'";
        $query_run = mysqli_query($conn, $query);
        $values = mysqli_fetch_assoc($query_run);
        $rowsSunday = $values['comm'];

        $query = "SELECT comm FROM commission WHERE day='monday'";
        $query_run = mysqli_query($conn, $query);
        $values = mysqli_fetch_assoc($query_run);
        $rowsMonday = $values['comm'];

        $query = "SELECT comm FROM commission WHERE day='tuesday'";
        $query_run = mysqli_query($conn, $query);
        $values = mysqli_fetch_assoc($query_run);
        $rowsTuesday = $values['comm'];

        $query = "SELECT comm FROM commission WHERE day='wednesday'";
        $query_run = mysqli_query($conn, $query);
        $values = mysqli_fetch_assoc($query_run);
        $rowsWednesday = $values['comm'];

        $query = "SELECT comm FROM commission WHERE day='thursday'";
        $query_run = mysqli_query($conn, $query);
        $values = mysqli_fetch_assoc($query_run);
        $rowsThursday = $values['comm'];

        $query = "SELECT comm FROM commission WHERE day='friday'";
        $query_run = mysqli_query($conn, $query);
        $values = mysqli_fetch_assoc($query_run);
        $rowsFriday = $values['comm'];

        $query = "SELECT comm FROM commission WHERE day='saturday'";
        $query_run = mysqli_query($conn, $query);
        $values = mysqli_fetch_assoc($query_run);
        $rowsSaturday = $values['comm'];
        ?>

        <!-- style the chart -->
        <div style="width: 700px;">
          <canvas id="myChart"></canvas>
        </div>

        <script>
          //setup
          const labels = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
          const data = {
            labels: labels,
            datasets: [{
              label: 'Commission Dataset',
              data: [ <?php echo $rowsSunday; ?>, <?php echo $rowsMonday; ?>, <?php echo $rowsTuesday; ?>, <?php echo $rowsWednesday; ?>, <?php echo $rowsThursday; ?>, <?php echo $rowsFriday; ?>, <?php echo $rowsSaturday; ?> ],
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
        
          <div class="footer">
      <p>Copyright &copy; 2022 UMP FOODY. All rights reserved.</p>
    </div>
        </center>
  </body>
</html>