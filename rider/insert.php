<?php
include 'database.php';
$id = $_GET['id'];
$sql = "SELECT * FROM `commission` WHERE id='$id'";
$result = mysqli_query($conn, $sql) or die (mysqli_error());
$row = mysqli_fetch_array($result);

$day = $row['day'];
$result = $row['comm'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lab 11</title>
    <style>
      tr {
        line-height: 40px;
      }
    </style>
  </head>
  <body>
    <form action="insertreport.php?id=<?php echo $id; ?>" method="post">
      <table>
        <tr>
          <td>Day:</td>
          <td><input type="text" name="day" value="<?php echo $day; ?>"/></td>
        </tr>
        <tr>
		<td>Commission:</td>
		<td><input type="text" name="comm" value="<?php echo $comm; ?>"/></td>
        </tr>
          
      </table>
        <input type="submit" value="Submit" />
    </form>
  </body>
</html>